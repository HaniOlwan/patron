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
            $quiz = Quiz::create(
                [
                    'title' => $validatedCredentials['title'],
                    'subject_id' => $validatedCredentials['subjectId'],
                    'start_date' => $request['start_date'],
                    'start_time' => $request['start_time'],
                    'deadline_date' => $request['exp_date'],
                    'deadline_time' => $request['exp_time'],
                    'duration' => $request['duration'],
                    'mark' => $request['questions_count'],
                    'user_id' => Auth::user()->id,
                ]
            );
            foreach ($request['questions'] as $question) {
                $quiz->topics()->attach($quiz, [
                    'quiz_id' => $quiz->id,
                    'topic_id' => $question['topicId'],
                    'topic_questions' => $question['value']
                ]);
            }
            return response()->json(["success" => 'Quiz created successfully', "status" => 201]);
        } catch (Exception $e) {
            return $e->getMessage();
            return response()->json(["error" => 'Make sure your input is correct', 400]);
        }
    }

    function viewQuiz(Quiz $quiz)
    {
        // $topic = $quiz->topics;
        // return $topic[0];
        return view('teacher.quiz.view-quiz', compact('quiz'));
    }

    function viewEditQuiz(Quiz $quiz)
    {
        return view('teacher.quiz.edit-quiz', compact('quiz'));
    }
}
