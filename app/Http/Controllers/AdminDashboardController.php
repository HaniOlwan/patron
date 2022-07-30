<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
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

    function viewAssignTeachers(Subject $subject)
    {
        $teachers = User::where('rule', 'teacher')->get();
        return view('admin.subject.assign-teachers', ['teachers' => $teachers, 'subject' => $subject]);
    }

    function teacherProfile(User $user)
    {
        return view('admin.teacher-profile', ['teacher' => $user, 'subject' => Subject::all()->first()]);
    }

    function assignTeacher(Request $request, Subject $subject)
    {
        $id = $request->teacherId;
        $teacher = User::query()->whereId($id)->first();
        $teacher->assignedSubjects()->sync($subject, [
            'teacher_id' => $teacher->id,
            'subject_id' => $subject->id
        ]);
        return response()->json([
            'message' => "Successfully assigned teacher to subject.",
            'status' => 201
        ]);
    }

    function dropSubject(Request $request, Subject $subject)
    {
        $subject->teachers()->detach([
            'teacher_id' => $request->teacherId
        ]);
        return response()->json([
            'message' => "Subject dropped.",
            'status' => 201
        ]);
    }
}
