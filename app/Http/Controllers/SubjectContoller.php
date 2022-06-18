<?php

namespace App\Http\Controllers;

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
        return view('teacher.subjects', ['subjects' => $subjects]);
    }

    function viewCreateSubject()
    {
        return view('teacher.create-subject');
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
            return redirect('/teacher/subjects')->with('success', 'Subject created successfully.');
        } catch (QueryException $qe) {
            return redirect('/teacher/create-subject')->with('error', 'Subject name or id is already exists in your subjects');
        }
    }

    function deleteSubject($id)
    {
        $subject = Subject::query()->whereSubjectId($id)->first();
        if(!$subject) return response()->json(['success'=>false ], 404);
        
        return response()->json(['success'=> $subject->delete()], 200);
    }
}
