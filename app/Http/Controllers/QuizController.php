<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        // $validatedCredentials = $request->validate([
        //     'title' => 'required',
        //     'subjectId' => 'required',
        // ]);

        // $quiz = Quiz::create(
        //     [
        //         'title' => $validatedCredentials['title'],
        //         'subject_id' => $validatedCredentials['subjectId'],
        //         'start_date' => $request->start_date,
        //         'start_time' => $request->start_date,
        //         'deadline_date' => $request->start_date,
        //         'deadline_time' => $request->start_date,
        //         'duration' => $request->start_date,
        //         'user_id' => Auth::user()->id,
        //     ]

        // );

        try {
            Quiz::create(
                [
                    'title' => "test",
                    'subject_id' => "test",
                    'start_date' => "test",
                    'start_time' => "test",
                    'deadline_date' => "test",
                    'deadline_time' => "test",
                    'duration' => "test",
                    'mark' => "test",
                    'user_id' => "test",
                ]
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
