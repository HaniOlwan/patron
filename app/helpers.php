<?php

use App\Models\SubjectStudent;

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
