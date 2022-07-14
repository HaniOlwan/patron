<?php

use App\Models\SubjectStudent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


function changeDateFormate($date, $date_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function productImagePath($image_name)
{
    return public_path('images/products/' . $image_name);
}

function studentJoinedSubject($studentId, $subjectId)
{
    $is_true = false;
    foreach (SubjectStudent::all() as $stdSub) {
        if ($stdSub->student_id == $studentId) {
            if ($stdSub->subject_id ==  $subjectId) {
                $is_true = true;
            }
        }
    }
    return $is_true;
}

function hasAttended($quiz)
{
    $attended = false;
    foreach (Auth::user()->finishedQuizzes as $stdQuiz) {
        if ($stdQuiz->id == $quiz) {
            $attended = true;
        }
    }
    return $attended;
}

function notAttendedQuizzesCount()
{
    $count = 0;
    $subjects = Auth::user()->joinedSubjects;
    $attendedQuizzes = Auth::user()->attendedQuizzes;
    foreach ($subjects as $subject) {
        for ($i = 0; $i < $subject->quizzes->count(); $i++) {
            if ($attendedQuizzes->count() > 0) {
                if ($subject->quizzes[$i]->id != $attendedQuizzes[$i]->id) {
                    $count++;
                }
            } else {
                $count = $count + $subject->quizzes->count();
            }
        }
    }
    return $count;
}
