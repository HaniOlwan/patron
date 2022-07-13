<?php

use App\Models\SubjectStudent;
use App\Models\User;


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

function hasAttended($student, $quiz)
{
    $student = User::find($student)->first();
    foreach ($student->finishedQuizzes as $stdQuiz) {
        if ($stdQuiz->id == $quiz) {
            return true;
        } else {
            return false;
        }
    }
}
