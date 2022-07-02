<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectContoller extends Controller
{

    function index()
    {
        $user_id = Auth::user()->id;
        $subjects = User::find($user_id)->subjects;
        return view('teacher.subject.subjects', ['subjects' => $subjects]);
    }

    function createPage()
    {
        return view('teacher.subject.create-subject');
    }

    function create(Request $request)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
                'subject_id' => 'required',
                'description' => "required",
            ]);
            $subject = Subject::create([
                'user_id' => Auth::user()->id,
                'title' => $validatedCredentials["title"],
                'subject_id' => $validatedCredentials["subject_id"],
                'code' => rand(1000, 9999),
                'description' => $validatedCredentials["description"],
                'private' => $request->private ? true : false,
            ]);
            return redirect('/subjects')->with('success', 'Subject created successfully.');
        } catch (QueryException $qe) {
            return redirect('/create-subject')->with('error', 'Subject name or id is already exists in your subjects');
        }
    }

    function destory($id)
    {
        $subject = Subject::query()->whereSubjectId($id)->first();
        if (!$subject) return response()->json(['success' => false], 404);

        return response()->json(['success' => $subject->delete()], 200);
    }


    function updatePage(Subject $subject)
    {
        return view('teacher.subject.edit-subject', compact('subject'));
    }

    function update(Request $request, Subject $subject)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
                'subject_id' => 'required',
                'description' => "required",
            ]);

            $subject->update(
                [
                    'title' => $validatedCredentials['title'],
                    'subject_id' => $validatedCredentials['subject_id'],
                    'description' => $validatedCredentials['description'],
                    'private' => $request->private ? true : false,
                ]
            );

            return redirect('/edit-subject' . "/" . $subject->id)->with('success', 'Subject edited successfully.');
        } catch (Exception $e) {
            return redirect('/edit-subject' . "/" . $subject->id)->with('error', 'Subject edited successfully.');
        }
    }

    function viewSubject(Subject $subject)
    {
        return view('teacher.subject.view-subject', compact('subject'));
    }

    function questionBank(Subject $subject)
    {
        $topics = $subject->topics;
        $questions = Question::all();
        return view('teacher.subject.question-bank', ['subject' => $subject, 'topics' => $topics, 'questions' => $questions]);
    }
}
