<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;



class AdminDashboardController extends Controller
{
    function subjects()
    {
        $subjects = Subject::all();
        return view('admin.subjects', compact('subjects'));
    }

    function students()
    {
        return view('admin.students');
    }

    function viewCreateSubject()
    {
        return view('admin.subject.create');
    }

    function createSubject(Request $request)
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
            return redirect('/admin/subjects')->with('success', 'Subject created successfully.');
        } catch (QueryException $qe) {
            return redirect('/admin/create-subject')->with('error', 'Subject name or id is already exists in your subjects')->withInput();
        }
    }

    function viewSubject(Subject $subject)
    {
        return view('admin.subject.index', compact('subject'));
    }

    function viewEditSubject(Subject $subject)
    {
        return view('admin.subject.edit', compact('subject'));
    }

    function updateSubject(Request $request, Subject $subject)
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

            return redirect('/admin/subject' . "/" . $subject->id)->with('success', 'Subject edited successfully.');
        } catch (Exception $e) {
            return redirect('/admin/edit-subject' . "/" . $subject->id)->with('error', 'Something went wrong.');
        }
    }

    function destorySubject(Subject $subject)
    {
        if (!$subject) return response()->json(['success' => false], 404);
        return response()->json(['success' => $subject->delete()], 200);
    }
}
