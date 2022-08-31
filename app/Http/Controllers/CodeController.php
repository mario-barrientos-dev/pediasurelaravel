<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCodeRequest;
use App\Http\Requests\CodeRequest;
use App\Models\CustomerCode;
use App\Models\Contest;
use App\Models\ContestWinner;

class CodeController extends Controller
{
    /**
     * Register codes form page
     */
    public function get() {
        $customer = \Auth::guard('customers')->user();
        $nextContest = Contest::active()->next()->first();
        return view('codes', compact('customer', 'nextContest'));
    }

    /**
     * Register customer code
     */
    public function post(CodeRequest $request) {
        $customer = \Auth::guard('customers')->user();

        $imageName = $customer->id.'-'.time().'.'.$request->code->getClientOriginalExtension();
        $filePath = $request->code->storeAs('/customer-codes', $imageName, ['disk' => env('FILESYSTEM_DRIVER', 'public')]);
        
        $code = new CustomerCode;
        $code->code = $filePath;
        $code->customer_id = $customer->id;
        $code->ip = \Request::ip();
        $code->user_agent = \Request::header('user-agent');
        $code->save();

        \Session::flash('message', "Factura registrada correctamente.");
        return \Redirect::back();
    }

    /**
     * Register codes form page
     */
    public function winners() {
        $winners = ContestWinner::confirmed()
            ->orderBy('contest_id', 'asc')->get();
        $nextContest = Contest::active()->next()->first();
        return view('winners', compact('winners', 'nextContest'));
    }
}
