<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request as ClientRequest;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    function index()
    {
        return view('signup');
    }

    function createUser(Request $request)
    {
        // echo $request->first_name;
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' =>   $request->last_name,
            'email' =>    $request->email,
            'password' =>   $request->password,
            'rule' =>   $request->rule,
        ]);
        echo $user;
    }
}
