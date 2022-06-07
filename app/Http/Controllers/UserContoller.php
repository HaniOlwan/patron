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

    function createUser(Request $request)
    {
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' =>   $request->last_name,
                'email' =>    $request->email,
                'password' =>   Hash::make($request->password),
                'rule' =>   $request->rule,
            ]);
        } catch (\Illuminate\Database\QueryException $qe) {
            return back()->with('error', 'User already exists!');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
