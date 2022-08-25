<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            [
                'title' => 'Stack',
                'teacher_id' => '8',
                'subject_id' => '1',
            ], [
                'title' => 'Linked List',
                'teacher_id' => '8',
                'subject_id' => '1',
            ], [
                'title' => 'Queues',
                'teacher_id' => '9',
                'subject_id' => '1',
            ],
            [
                'title' => 'Data Objects',
                'teacher_id' => '9',
                'subject_id' => '2',
            ], [
                'title' => 'Data Visualization',
                'teacher_id' => '8',
                'subject_id' => '2',
            ], [
                'title' => 'Data Integration',
                'teacher_id' => '9',
                'subject_id' => '2',
            ],
            [
                'title' => 'Network Equipment',
                'teacher_id' => '8',
                'subject_id' => '3',
            ], [
                'title' => 'Wireless Networking',
                'teacher_id' => '8',
                'subject_id' => '3',
            ],
            [
                'title' => 'Searching and Sorting',
                'teacher_id' => '8',
                'subject_id' => '4',
            ], [
                'title' => 'Dynamic Programming',
                'teacher_id' => '8',
                'subject_id' => '4',
            ], [
                'title' => 'Pattern Searching',
                'teacher_id' => '9',
                'subject_id' => '4',
            ], [
                'title' => 'Procedures',
                'teacher_id' => '8',
                'subject_id' => '5',
            ], [
                'title' => 'Data Transfers, Addressing and Arithmetic',
                'teacher_id' => '8',
                'subject_id' => '5',
            ], [
                'title' => 'Integer Arithmetic',
                'teacher_id' => '9',
                'subject_id' => '5',
            ], [
                'title' => 'Processor Architecture',
                'teacher_id' => '8',
                'subject_id' => '5',
            ],
            [
                'title' => 'Set theory',
                'teacher_id' => '8',
                'subject_id' => '6',
            ], [
                'title' => 'Logic',
                'teacher_id' => '9',
                'subject_id' => '6',
            ], [
                'title' => 'Information theory',
                'teacher_id' => '8',
                'subject_id' => '6',
            ], [
                'title' => 'Theoretical computer science',
                'teacher_id' => '8',
                'subject_id' => '6',
            ]
        ];
        DB::table('topics')->insert($topics);
    }
}
