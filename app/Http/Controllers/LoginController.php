<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
            $name = Auth::user()->first_name . " " . Auth::user()->last_name;
            if ($rule === 'teacher') {
                return redirect()->intended('teacher')->with('name', $name);
                // also send quizz and subject counts for teacher
            }
            return redirect()->intended('student')->with('name', $name);
        } else {
            return back()->with('error', 'The provided credentials do not match our records.')->onlyInput('email');
        }
    }
}
