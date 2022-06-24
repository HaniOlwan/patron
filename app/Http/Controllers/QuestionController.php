<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    function index(Topic $topic)
    {
        return view('teacher.question.create-question', compact('topic'));
    }

    function create(Request $request, Topic $topic)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
                'answer1' => 'required',
                'answer2' => 'required',
                'answer3' => 'required',
                'answer4' => 'required',
                'correct_answer' => 'required',
            ]);
            $question = Question::create([
                'subject_id' => $topic->subject->id,
                'topic_id' => $topic->id,
                'teacher_id' => Auth::user()->id,
                'title' => $validatedCredentials['title'],
                'first_answer' => $validatedCredentials['answer1'],
                'second_answer' => $validatedCredentials['answer2'],
                'third_answer' => $validatedCredentials['answer3'],
                'forth_answer' => $validatedCredentials['answer4'],
                'correct_answer' => $validatedCredentials['correct_answer'],
            ]);
            return redirect('/view-topic' . "/" . $topic->id)->with('success', 'Question created successfully.');
        } catch (ValidationException $e) {
            return redirect('/view-topic' . "/" . $topic->id)->with('error', 'Could not create question.');
        }
    }

    function viewEditQuestion(Question $question)
    {
        return view('teacher.question.edit-question', compact('question'));
    }

    function update(Request $request, Question $question)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
                'answer1' => 'required',
                'answer2' => 'required',
                'answer3' => 'required',
                'answer4' => 'required',
                'correct_answer' => 'required',
            ]);
            $question->update([
                'subject_id' => $question->topic->subject->id,
                'topic_id' => $question->topic->id,
                'teacher_id' => Auth::user()->id,
                'title' => $validatedCredentials['title'],
                'first_answer' => $validatedCredentials['answer1'],
                'second_answer' => $validatedCredentials['answer2'],
                'third_answer' => $validatedCredentials['answer3'],
                'forth_answer' => $validatedCredentials['answer4'],
                'correct_answer' => $validatedCredentials['correct_answer'],
            ]);
            return redirect('/question-bank' . "/" . $question->topic->subject->subject_id)->with('success', 'Question edited successfully.');
        } catch (ValidationException $e) {
            return redirect('/question-bank' . "/" . $question->topic->subject->subject_id)->with('error', 'Could not update question.');
        }
    }

    function destroy(Question $question)
    {
        if (!$question) return response()->json(['success' => false], 404);
        return response()->json(['success' => $question->delete()], 200);
    }
}
