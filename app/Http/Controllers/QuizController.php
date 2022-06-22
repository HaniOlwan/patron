<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    function index()
    {
        return view('teacher.quiz.quizzes');
    }
    function create($id)
    {   
        $subject = Subject::query()->whereSubjectId($id)->first();
        return view('teacher.quiz.create-quiz', ['subject' => $subject]);
    }
}
