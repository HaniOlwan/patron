<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [[
            'title' => 'Data Structure',
            'subject_id' => "ITCS" . rand(1000, 9999),
            'code' => Str::random(4),
            'private' => '0',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
            'user_id' => '1',
        ], [
            'title' => 'Data Mining',
            'subject_id' => "ITCS" . rand(1000, 9999),
            'code' => Str::random(4),
            'private' => '0',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
            'user_id' => '1',
        ], [
            'title' => 'Computer Networking',
            'subject_id' => "ITCS" . rand(1000, 9999),
            'code' => Str::random(4),
            'private' => '1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
            'user_id' => '1',
        ], [
            'title' => 'Algorithms',
            'subject_id' => "ITCS" . rand(1000, 9999),
            'code' => Str::random(4),
            'private' => '1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
            'user_id' => '1',
        ], [
            'title' => 'Assembly language',
            'subject_id' => "ITCS" . rand(1000, 9999),
            'code' => Str::random(4),
            'private' => '1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
            'user_id' => '1',
        ], [
            'title' => 'Discrete Mathematics',
            'subject_id' => "ITCS" . rand(1000, 9999),
            'code' => Str::random(4),
            'private' => '1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
            'user_id' => '1',
        ]];
        DB::table('subjects')->insert($subjects);
    }
}
