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

    function create(Request $request)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
            ]);
            Topic::create([
                'title' => $validatedCredentials['title']
            ]);

            return redirect('/subjects')->with('success', 'Topic created successfully.');
        } catch (Exception $e) {
            return redirect('/subjects')->with('error', 'Could not create topic.');
        }
    }
}