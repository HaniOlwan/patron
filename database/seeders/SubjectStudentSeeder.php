<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubjectStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [[
            'student_id' => '1',
            'subject_id' => '1',
        ], [
            'student_id' => '1',
            'subject_id' => '2',
        ], [
            'student_id' => '1',
            'subject_id' => '3',
        ], [
            'student_id' => '2',
            'subject_id' => '1',
        ], [
            'student_id' => '2',
            'subject_id' => '2',
        ], [
            'student_id' => '2',
            'subject_id' => '3',
        ], [
            'student_id' => '3',
            'subject_id' => '4',
        ], [
            'student_id' => '3',
            'subject_id' => '1',
        ], [
            'student_id' => '4',
            'subject_id' => '5',
        ], [
            'student_id' => '5',
            'subject_id' => '4',
        ], [
            'student_id' => '5',
            'subject_id' => '2',
        ], [
            'student_id' => '5',
            'subject_id' => '3',
        ], [
            'student_id' => '6',
            'subject_id' => '2',
        ], [
            'student_id' => '7',
            'subject_id' => '1',
        ], [
            'student_id' => '6',
            'subject_id' => '5',
        ], [
            'student_id' => '7',
            'subject_id' => '2',
        ]];
        DB::table('subject_student')->insert($teachers);
    }
}
