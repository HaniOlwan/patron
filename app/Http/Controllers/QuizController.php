<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    function index()
    {
        return view('teacher.quiz.quizzes');
    }
}
