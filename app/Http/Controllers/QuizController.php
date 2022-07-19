<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

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

            $questions_count  = 0;
            foreach ($request['questions'] as $question) {
                $quiz->topics()->attach($quiz, [
                    'quiz_id' => $quiz->id,
                    'topic_id' => $question['topicId'],
                    'topic_questions' => $question['value']
                ]);
                $questions_count = $questions_count  + $question['value'];
            }

            foreach (Question::where('subject_id', $request->subjectId)->limit($questions_count)->get() as $question) {
                $quiz->questions()->attach($quiz, [
                    'question_id' => $question->id,
                    'quiz_id' => $quiz->id
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


    function attendQuiz()
    {
        session(['isAttendingQuiz' => true]);
    }

    function attendQuizPage(Quiz $quiz)
    {
        if (!session()->has('isAttendingQuiz')) {
            return redirect()->back();
        }

        Cookie::queue('quiz', $quiz->id, $quiz->duration);
        Cookie::queue('subject', $quiz->subject->id, $quiz->duration);

        return view('student.attend-quiz', [
            'quiz' => $quiz,
            'questions' => $quiz->questions,
        ]);
    }

    function submitQuiz(Quiz $quiz, Request $request)
    {
        try {
            $score = 0;
            if ($request->questions) {
                $data = collect();
                foreach ($quiz->questions as $question) {
                    $data->put($question->id, $question->correct_answer);
                }
                foreach ($data as $key => $value) {
                    if (!empty($request->questions[$key])) {
                        if ($request->questions[$key] === $value) {
                            $score++;
                        }
                    }
                }
            }
            if (!hasAttended($quiz->id)) {
                Auth::user()->attendedQuizzes()->attach(Auth::user()->id, [
                    'student_id' => Auth::user()->id,
                    'quiz_id' => $quiz->id,
                    'status' => 'finished',
                    'score' => $score,
                ]);
            }

            session()->forget('isAttendingQuiz');
            return redirect('/student/quizzes');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function getStudentQuizzes()
    {
        $quizzes = [];
        $joinedSubjects = Auth::user()->joinedSubjects;
        foreach ($joinedSubjects as $subject) {
            foreach ($subject->quizzes as $quiz) {
                array_push($quizzes, $quiz);
            }
        }
        return view('student.quizzes', compact('quizzes'));
    }

    function getQuizzesResults()
    {
        $attendedQuizzes = Auth::user()->attendedQuizzes;
        return view('student.quizzes-results', ['quizzes' => $attendedQuizzes]);
    }

    function analysisResults(Quiz $quiz)
    {
        return view('teacher.quiz.analysis-results', compact('quiz'));
    }

    function sample(Quiz $quiz)
    {
        return view('teacher.quiz.attend-quiz', [
            'quiz' => $quiz,
            'questions' => $quiz->questions,
        ]);
    }
}
