<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectContoller extends Controller
{
    function index(){
        return view('create-subject');
    }
}
