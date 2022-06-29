<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subject_id',
        'code',
        'description',
        'private',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Topic()
    {
        return $this->hasMany(Topic::class);
    }


    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
