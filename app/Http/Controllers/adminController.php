<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function check()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            // return redirect('admin');
            return view('admin.layouts.lay');
        } else {
            // $request->session()->flash('error', '5555555555');
            return redirect('admin/check');
        }
    }
}
