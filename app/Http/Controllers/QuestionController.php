<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    function index()
    {
        return view('teacher.question.create-question');
    }

    function create(Request $request)
    {
        return $request;
        // return view('teacher.question.create-question');
    }
}
