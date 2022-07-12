<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;




class QuizController extends Controller
{

    protected $prev_id = 0;
    function index()
    {
        $quizzes = Auth::user()->quizzes;
        return view('teacher.quiz.quizzes', compact('quizzes'));
    }

    function createPage(Subject $subject)
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
            return response()->json(["error" => 'Make sure your input is correct', 400])->withInput();
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
    }


    function getAttendQuiz(Quiz $quiz)
    {
        session(['isAttendingQuiz' => true]);
        return $quiz;
    }


    function getQuizPage(Quiz $quiz, Question $question)
    {
        if (!session()->has('isAttendingQuiz')) {
            return redirect()->back();
        }
        try {

            $answer = Answer::where('question_id', $question->id)->first();

            return view('student.attend-quiz', ['quiz' => $quiz, 'question' => $question, 'answer' => $answer]);

            if (!$answer->count()) {
                return view('student.attend-quiz', ['quiz' => $quiz, 'question' => $question, 'answer' => $answer]);
            }

            // $answer = Answer::where('question_id', $question->id)->first();
            // $first_row =  Question::where('id', '>', 0)->orderBy('id')->first();
            // return $first_row;
            // $next_question = Question::where('id', '>', $question->id)->orderBy('id')->first();
            // if ($first_row == $next_question) {
            // } else {
            //     return view('student.attend-quiz', ['quiz' => $quiz, 'question' => $first_row, 'answer' => $answer]);
            // }
        } catch (Exception $e) {
            return $e;
        }
    }


    function submitAnswer(Quiz $quiz, Question $question, Request $request)
    {
        try {
            $answer = Answer::where('question_id', $question->id)->first();
            if (!$answer->count()) {
                Answer::create([
                    'student_id' => Auth::user()->id,
                    'quiz_id' => $quiz->id,
                    'question_id' => $question->id,
                    'answer' => $request->answer
                ]);
            }
            $answer->update([
                'answer' => $request->answer
            ]);
            // $next_question_id = Question::where('id', '>', $request->questionId)->orderBy('id')->first();

            // if (!$next_question_id->count()) {
            //     return response()->json(['message' => "hide", 'status' => 400]);
            // }
            // return response()->json(['nextQuestion' => $next_question_id], 201);
        } catch (Exception $e) {
            return $e;
        }
    }
    function deleteSession()
    {
        return session()->forget('isAttendingQuiz');
    }
}
