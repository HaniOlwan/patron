<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TopicController extends Controller
{
    function index(Subject $subject)
    {
        return view('teacher.topic.create-topic', compact('subject'));
    }

    function viewTopic(Topic $topic)
    {
        $subject = $topic->subject;
        return view('teacher.topic.view-topic', ['topic' => $topic, 'subject' => $subject]);
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
            return redirect('/question-bank' . '/' . $subject->id)->with('topic_success', 'Topic created successfully.');
        } catch (ValidationException $e) {
            return back()->with('topic_error', 'Could not create topic.');
        }
    }

    function viewEditTopic(Topic $topic)
    {
        $subject = $topic->subject;
        return view('teacher.topic.edit-topic', ['subject' => $subject, 'topic' => $topic]);
    }

    function update(Topic $topic, Request $request)
    {
        try {
            $validatedCredentials = $request->validate([
                'title' => 'required',
            ]);
            $topic->update([
                'title' => $validatedCredentials['title']
            ]);
            return redirect('/question-bank' . "/" . $topic->subject->id)->with('topic_success', 'Topic edited successfully.');
        } catch (ValidationException $e) {
            return redirect('/question-bank' . "/" . $topic->subject->id)->with('topic_error', 'Could not update topic.');
        }
    }

    function destroy(Topic $topic)
    {
        if (!$topic) return response()->json(['success' => false], 404);
        return response()->json(['success' => $topic->delete()], 200);
    }
}
