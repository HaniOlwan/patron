<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    function index()
    {
        return view('teacher.quiz.quizzes');
    }

    function create(Subject $subject)
    {
        return $subject->topic;
            return view('teacher.quiz.create-quiz', compact('subject'));
    }
}
