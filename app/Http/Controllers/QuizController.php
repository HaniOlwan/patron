<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizTopic;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Exception;


class QuizController extends Controller
{
    function index()
    {
        $quizzes = Auth::user()->quizs;
        return view('teacher.quiz.quizzes', compact('quizzes'));
    }

    function viewCreatePage(Subject $subject)
    {
        return view('teacher.quiz.create-quiz', compact('subject'));
    }

    function create(Request $request)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
                'subjectId' => 'required',
                'start_time' => 'required',
                'start_date' => 'required',
                'exp_time' => 'required',
                'exp_date' => 'required',
                'duration' => 'required',
                'mark' => 'required', // 1 mark for each question
            ]);

            $quiz = Quiz::create(
                [
                    'title' => $validatedCredentials['title'],
                    'subject_id' => $validatedCredentials['subjectId'],
                    'start_date' => $validatedCredentials['start_date'],
                    'start_time' => $validatedCredentials['start_time'],
                    'deadline_date' => $validatedCredentials['exp_date'],
                    'deadline_time' => $validatedCredentials['exp_time'],
                    'duration' => $validatedCredentials['duration'],
                    'mark' => $validatedCredentials['mark'],
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
            return $e;
            return response()->json(["error" => 'Make sure your input is correct', 400]);
        }
    }

    function viewQuiz(Quiz $quiz)
    {
        return view('teacher.quiz.view-quiz', compact('quiz'));
    }

    function viewEditQuiz(Quiz $quiz)
    {
        return view('teacher.quiz.edit-quiz', ['quiz' => $quiz, 'topics' => $quiz->topics, 'subject' => $quiz->subject]);
    }

    function update(Request $request, Quiz $quiz)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
                'start_date' => 'required',
                'start_time' => 'required',
                'exp_date' => 'required',
                'exp_time' => 'required',
                'duration' => 'required',
                'questions_count' => 'required',
            ]);

            $quiz->update(
                [
                    'title' => $validatedCredentials['title'],
                    'start_date' => $validatedCredentials['start_date'],
                    'start_time' => $validatedCredentials['start_time'],
                    'deadline_date' => $validatedCredentials['exp_date'],
                    'deadline_time' => $validatedCredentials['exp_time'],
                    'duration' => $validatedCredentials['duration'],
                    'mark' => $validatedCredentials['questions_count'],
                ]
            );
            foreach ($request['questions'] as $question) {
                $quiz->topics()->updateExistingPivot($question['topicId'], [
                    'topic_id' => $question['topicId'],
                    'topic_questions' => $question['value']
                ]);
            }
            return response()->json(["success" => 'Quiz Edited successfully', "status" => 201]);
        } catch (Exception $e) {
            return response()->json(["error" => 'Make sure your input is correct', 400]);
        }
    }


    function destroy(Quiz $quiz)
    {
        if (!$quiz) return response()->json(['success' => false], 404);
        return response()->json(['success' => $quiz->delete()], 200);
    }

    function viewSelectPage(Quiz $quiz)
    {
        return view('teacher.quiz.select-topic', compact('quiz'));
    }

    function selectTopic(Request $request, Quiz $quiz)
    {

        foreach ($request->data as $question) {
            $quiz->topics()->attach($quiz, [
                'topic_id' => $question['topicId'],
                'topic_questions' => $question['value']
            ]); // add new record
        }
        return response()->json(['success' => "Topic added to quiz"], 201);

        // foreach ($request->data as $question) {
        //     if ($request == []) {
        //         $quiz->topics()->detach(); // remove all records
        //     } else if (!$quiz->topics->contains($question['topicId'])) {
        //         $quiz->topics()->attach($quiz, [
        //             'topic_id' => $question['topicId'],
        //             'topic_questions' => $question['value']
        //         ]); // add new record
        //     } else {
        //         $quiz->topics()->detach($question['topicId'], [
        //             'topic_questions' => $question['value']
        //         ]);
        //         $quiz->topics()->attach($quiz, [
        //             'topic_id' => $question['topicId'],
        //             'topic_questions' => $question['value']
        //         ]);
        //         // update new record
        //     }
        // }
    }
}
