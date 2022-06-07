<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserContoller extends Controller
{
    function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
