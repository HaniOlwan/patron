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
        try {
            $validatedUser = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:3'
            ]);

            if (Auth::attempt($validatedUser)) {
                $request->session()->regenerate(); //prevent session faxation attack
                $rule = User::where('email', $validatedUser['email'])->pluck('rule')->first();
                if ($rule === 'teacher') {
                    return redirect()->intended('teacher');
                }
                return redirect()->intended('student');
            } else {
                return back()->with('error', 'The provided credentials do not match our records.')->onlyInput('email');
            }
        } catch (Exception $e) {
            
        }
    }
}
