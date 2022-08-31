<?php

namespace App\Http\Controllers\Admin;

use TCG\Voyager\Http\Controllers\Controller;
use League\Csv\Writer;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Export customers
     */
    public function export() {
        $customers = Customer::withCount('codes')->orderBy('created_at', 'desc')->get();
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->setDelimiter(';');
        $csv->insertOne([
            'identificacion',
            'nombre',
            'apellido',
            'email',
            'teléfono',
            'total facturas',
            'activo',
            'ip',
            'user_agent',
            'fecha'
        ]);

        foreach ($customers as $item) {
            $csv->insertOne([
                $item->identification,
                $item->name,
                $item->last_name,
                $item->email,
                $item->phone,
                $item->codes_count,
                $item->active ? 'si' : 'no',
                $item->ip,
                $item->user_agent,
                $item->created_at
            ]);
        }
        $csv->output('registros.csv');
    }

}
