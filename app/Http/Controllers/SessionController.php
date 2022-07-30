<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;


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
            if ($rule === 'admin') {
                return redirect('/admin');
            } else if ($rule === 'teacher') {
                return redirect('/dashboard');
            } else {
                return redirect('/student');
            }
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
