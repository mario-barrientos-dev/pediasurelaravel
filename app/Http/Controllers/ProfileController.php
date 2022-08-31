<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCodeRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Customer info page
     */
    public function get() {
        $customer = \Auth::guard('customers')->user();
        return view('profile', compact('customer'));
    }

    /**
     * Update customer info
     */
    public function post(ProfileRequest $request) {
        $customer = \Auth::guard('customers')->user();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        if (!empty($request->password)) {
            $customer->password = Hash::make($request->password);
        }
        $customer->save();

        \Session::flash('message', "Datos actualizados correctamente.");
        return \Redirect::back();
    }
}
