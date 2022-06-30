<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';


    protected $fillable = [
        'title',
        'subject_id',
        'start_date',
        'start_time',
        'deadline_date',
        'deadline_time',
        'duration',
        'mark',
        'user_id',
    ];

    function User()
    {
        return $this->belongsTo(User::class);
    }

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    function topics()
    {
        return $this->belongsToMany(Topic::class, 'quiz_topic', 'quiz_id', 'topic_id')->withPivot('topic_questions');
    }

    function questions()
    {
        return $this->hasMany(Question::class);
    }
}
