<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    function signup()
    {
        return view('signup');
    }

    function store(Request $request)
    {
        try {
            $validatedUser = $request->validate([
                'first_name' => 'required',
                'last_name' =>   'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'rule' => 'required|string',
            ]);
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' =>   $request->last_name,
                'email' =>    $request->email,
                'password' =>   Hash::make($request->password),
                'rule' =>   $request->rule,
            ]);
            $name = Auth::user()->first_name . " " . Auth::user()->last_name;

            if ($request->rule === 'teacher') {
                return redirect()->intended('teacher')->with('name', $name);
            } else {
                return redirect()->intended('student')->with('name', $name);
            }
        } catch (Exception $e) {
            return back()->withInput($request->all)->with('error', 'User already exists!');
        }
    }
}
