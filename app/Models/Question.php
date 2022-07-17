<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'first_answer',
        'second_answer',
        'third_answer',
        'forth_answer',
        'correct_answer',
        'topic_id',
        'subject_id',
        'teacher_id'
    ];

    function Topic()
    {
        return $this->belongsTo(Topic::class);
    }

    function quiz()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_question', 'question_id', 'quiz_id');
    }

    function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
