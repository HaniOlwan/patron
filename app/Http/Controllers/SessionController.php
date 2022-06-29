<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class SessionController extends Controller
{
    function login()
    {
        return view('signin');
    }

    function authenticate(Request $request)
    {
        $validatedUser = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($validatedUser)) {
            $request->session()->regenerate(); //prevent session faxation attack
            $rule = User::where('email', $validatedUser['email'])->pluck('rule')->first();
            if ($rule === 'teacher') {
                return redirect()->intended('dashboard');
            }
            return redirect()->intended('student');
        } else {
            return back()->with('error', 'The provided credentials do not match our records.')->onlyInput('email');
        }
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('signin');
    }
}
