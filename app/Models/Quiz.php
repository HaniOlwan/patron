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
}
