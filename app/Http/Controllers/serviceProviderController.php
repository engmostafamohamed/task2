<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceProviderController extends Controller
{
    //
    public function check()
    {
        return view('serviceProvider.login');
    }

    public function login(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('serviceProvider')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            // return redirect('serviceProvider');
            return view('admin.layouts.lay');
        } else {
            $request->session()->flash('error', '5555555555');
            return redirect('serviceProvider/check');
        }
    }
}
