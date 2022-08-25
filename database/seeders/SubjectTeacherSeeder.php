<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [[
            'teacher_id' => '8',
            'subject_id' => '1',
        ],[
            'teacher_id' => '9',
            'subject_id' => '1',
        ], [
            'teacher_id' => '9',
            'subject_id' => '2',
        ], [
            'teacher_id' => '8',
            'subject_id' => '3',
        ], [
            'teacher_id' => '9',
            'subject_id' => '4',
        ], [
            'teacher_id' => '8',
            'subject_id' => '5',
        ],[
            'teacher_id' => '8',
            'subject_id' => '6',
        ], [
            'teacher_id' => '9',
            'subject_id' => '6',
        ]];
        DB::table('subject_teacher')->insert($teachers);
    }
}
