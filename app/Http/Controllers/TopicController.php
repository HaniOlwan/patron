<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    function index(Subject $subject)
    {
        return view('teacher.topic.create-topic', compact('subject'));
    }

    function create(Request $request, Subject $subject)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
            ]);

            $topic = Topic::create([
                'title' => $validatedCredentials['title'],
                'teacher_id' => $request->user()->id,
                'subject_id' => $subject->id
            ]);
            return redirect('/subjects')->with('success', 'Topic created successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Could not create topic.');
        }
    }
}
