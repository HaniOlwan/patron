<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class SubjectContoller extends Controller
{

    function index()
    {
        $subjects = Auth::user()->subjects;
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
            return redirect('/create-subject')->with('error', 'Subject name or id is already exists in your subjects')->withInput();
        }
    }

    function destory(Subject $subject)
    {
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


    function viewSubjectsPage()
    {
        return view('student.subjects');
    }

    function viewJoinSubject()
    {
        return view('student.join-subject');
    }

    function search(Request $request)
    {
        session()->flashInput($request->input()); // save old search input
        $search = $request->input('query');
        $subjects = [];
        if ($search) {
            $subjects = Subject::query()
                ->where('subject_id', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")->get();
        }
        return view('student.join-subject', compact('subjects'));
    }

    function viewSubjectStudent(Subject $subject)
    {
        return view('student.view-subject', compact('subject'));
    }


    function registerSubject(Request $request, Subject $subject)
    {
        $student = Auth::user();

        if ($request->status === 'private') {
            if ($request->code == $subject->code) {
                $student->joinedSubjects()->attach($subject, [
                    'subject_id' => $subject->id,
                ]);
                return response()->json([
                    'message' => "Joined subject successfully",
                    'status' => 201
                ]);
            }
            return response()->json([
                'message' => "Incorrect subject code",
                'status' => 400
            ]);
        } else {
            $student->joinedSubjects()->attach($subject, [
                'subject_id' => $subject->id,
            ]);
            return response()->json([
                'message' => "Joined subject successfully",
                'status' => 201
            ]);
        }
    }

    function dropSubject(Subject $subject)
    {
        $result = $subject->students()->detach(Auth::user()->id);
        if ($result) {
            return response()->json([
                'message' => "Subject dropped.",
                'status' => 201
            ]);
        }
        return response()->json([
            'message' => "Something went wrong.",
            'status' => 400
        ]);
    }

    function deleteStudent(User $user, Subject $subject)
    {
        $response = $user->joinedSubjects()->detach([
            'student_id' => $user->id,
            'subject_id' => $subject->id,
        ]);
        if ($response) return response()->json(['status' => 201]);
        return response()->json(['status' => 400]);
    }

    function participants(Subject $subject)
    {
        return view('teacher.subject.participants', compact('subject'));
    }
}
