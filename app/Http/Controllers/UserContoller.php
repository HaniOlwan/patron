<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;



class UserContoller extends Controller
{
    function index()
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
            return redirect('/');
        } catch (Exception $e) {
            return back()->withInput($request->all)->with('error', 'User already exists!');
        }
    }
}
