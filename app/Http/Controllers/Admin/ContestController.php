<?php

namespace App\Http\Controllers\Admin;


use TCG\Voyager\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\ContestWinner;

class ContestController extends Controller
{
    /**
     * Generate winners by contest
     */
    public function generate(Request $request) {
        $validator = Validator::make($request->all(), [
            'contest' => 'required|exists:contests,id',
        ]);
        if ($validator->fails()) {
            return back()->with( $this->alertError('El sorteo seleccionado es invalido.') );
        }

        $contest = Contest::find( $request->contest );
        if ( !empty($contest->winners->count()) ) {
            return back()->with( $this->alertError('El sorteo seleccionado ya tiene ganadores relacionados.') );
        }

        $contestDate = $contest->contest_date->format("Y-m-d H:i:s");
        $limit = $contest->total_winners;        
        $codes = DB::select(
                DB::raw("
                    SELECT * FROM ( 
                        SELECT cc.id, cc.customer_id, cw.confirmed
                        FROM customer_codes cc
                        INNER JOIN customers c ON c.id = cc.customer_id AND c.active = 1
                        LEFT JOIN contest_winners cw ON cc.id = cw.code_id
                        WHERE cc.created_at <= '$contestDate'
                        AND (cw.confirmed is null OR cw.confirmed = 0)
                        ORDER BY RAND()
                    ) AS ShuffeledItems
                    GROUP BY ShuffeledItems.customer_id
                    ORDER BY RAND()
                    LIMIT $limit
                ")
            );

        if (empty($codes)) {
            return back()->with( $this->alertError('No se encontraron facturas disponibles para participar.') );
        }

        foreach ($codes as $key => $code) {
            $winner = new ContestWinner;
            $winner->contest_id = $contest->id;
            $winner->customer_id = $code->customer_id;
            $winner->code_id = $code->id;
            $winner->save();
        }

        return back()->with( $this->alertInfo("La generación del sorteo se realizó con éxito.") );
    }

    /**
     * Update contest winners
     */
    public function update(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'contest' => 'required|exists:contests,id',
            'code_id' => 'required|array',
            'confirmed' => 'array',
        ]);
        if ($validator->fails()) {
            return back()->with( $this->alertError('El sorteo seleccionado o la información es invalido.') );
        }

        foreach ($data['code_id'] as $key => $codeId) {
            $confirmed = isset($data['confirmed']) && isset($data['confirmed'][$key]) && $data['confirmed'][$key] == 'on' ? true : false;
            ContestWinner::where('code_id', $codeId)
                ->where('contest_id', $data['contest'])
                ->update([
                    'confirmed' => $confirmed
                ]);
        }

        return back()->with( $this->alertInfo("La información del sorteo se actualizó correctamente.") );
    }
}
