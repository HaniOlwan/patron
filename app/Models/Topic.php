<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'teacher_id',
        'subject_id'
    ];

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function Question()
    {
        return $this->hasMany(Question::class);
    }

    public function quizzes()
    {
        return $this->belongsToMany('Quiz', 'quiz_topic', 'topic_id', 'quiz_id');
    }
}
