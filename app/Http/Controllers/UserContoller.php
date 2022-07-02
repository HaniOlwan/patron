<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class UserContoller extends Controller
{
    function profile()
    {

        $teacher = Auth::user();
        return view('teacher.profile', compact('teacher'));
    }
}
