<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    const TYPE_TEACHER = 'teacher';
    const TYPE_STUDENT = 'student';

    protected $fillable = [
        'title',
        'subject_id',
        'code',
        'description',
        'private',
        'user_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,'user_id')->where('rule', self::TYPE_TEACHER);
    }

    public function students()
    {
        return $this->belongsToMany(User::class,'subject_student','subject_id','student_id')->where('rule', self::TYPE_STUDENT);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }


    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
