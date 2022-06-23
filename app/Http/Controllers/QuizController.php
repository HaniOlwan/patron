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

    function viewCreatePage(Subject $subject)
    {
        $topics = $subject->topic;
        return view('teacher.quiz.create-quiz', ['subject' => $subject, 'topics' => $topics]);
    }

    function create(Request $request)
    {
        return $request;
    }
}
