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
        $quizzes = Auth::user()->quizs;
        return view('teacher.quiz.quizzes', compact('quizzes'));
    }

    function viewCreatePage(Subject $subject)
    {
        $topics = $subject->topic;
        return view('teacher.quiz.create-quiz', ['subject' => $subject, 'topics' => $topics]);
    }

    function create(Request $request)
    {
        try {

            $validatedCredentials = $request->validate([
                'title' => 'required',
                'subjectId' => 'required',
            ]);
            Quiz::create(
                [
                    'title' => $validatedCredentials['title'],
                    'subject_id' => $validatedCredentials['subjectId'],
                    'start_date' => $request->start_date,
                    'start_time' => $request->start_date,
                    'deadline_date' => $request->start_date,
                    'deadline_time' => $request->start_date,
                    'duration' => $request->start_date,
                    'mark' => $request->questions_count,
                    'user_id' => Auth::user()->id,
                ]
            );
            return response()->json(["success" => 'Quiz created successfully', "status" => 201]);
        } catch (Exception $e) {
            return response()->json(["error" => 'Make sure your input is correct', 400]);
        }
    }
}
