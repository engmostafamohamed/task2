<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('admin/check');
    }

}
