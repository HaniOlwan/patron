<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Contracts\Session\Session;





class QuizController extends Controller

{

    static $questions_count = 0;

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
        session(['question_count' => 1]);
        session(['isAttendingQuiz' => true]);
        return $quiz;
    }


    function getQuizPage(Quiz $quiz, Question $question, Request $request)
    {
        if (!session()->has('isAttendingQuiz')) {
            return redirect()->back();
        }
        try {
            $answer = Answer::where('question_id', $question->id)->first();
            session(['question_count' => session('quesiton_count') + 1]);
            return view('student.attend-quiz', [
                'quiz' => $quiz, 'question' => $question,
                'answer' => $answer,
            ]);
        } catch (Exception $e) {
            return $e;
        }
    }


    function submitAnswer(Quiz $quiz, Question $question, Request $request)
    {
        try {
            $answer = Answer::where('question_id', $question->id)->first();
            if ($answer === null) {
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
            $previous = Question::where('id', '<', $question->id)->max('id');
            $next = Question::where('id', '>', $question->id)->min('id');

            if ($request->next) {
                return redirect('/student/quiz-page/' . $quiz->id . '/' . $next);
            } else {
                return redirect('/student/quiz-page/' . $quiz->id . '/' . $previous);
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    function deleteSession(Request $request)

    {
        $quiz = Quiz::find($request->quizId)->first();

        $student_answers = Answer::where('student_id', '=', Auth::user()->id)
            ->where('quiz_id', '=', $request->quizId)->get();

        $score = 0;
        for ($i = 0; $i < $quiz->questions->count(); $i++) {
            if ($quiz->questions[$i]['correct_answer'] == $student_answers[$i]['answer']) {
                $score++;
            }
        }

        Auth::user()->attendedQuizzes()->attach(Auth::user()->id, [
            'student_id' => Auth::user()->id,
            'quiz_id' => $quiz->id,
            'status' => 'finished',
            'score' => $score,
        ]);
        session()->forget('isAttendingQuiz');

        return redirect('student/view-subject/' . $request->subjectId);
    }
}
