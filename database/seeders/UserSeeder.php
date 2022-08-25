<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'first_name' => 'Hani',
            'last_name' => 'Elwan',
            'email' => 'hani@gmail.com',
            'password' => '$2y$10$oKlOVZFuvBeNTMuf3UksOeOWM8qcge8320m5yC2BioZWY6TZjZw5O',
            'rule' => 'teacher',
        ], [
            'first_name' => 'Ayyob',
            'last_name' => 'Sameer',
            'email' => 'ayyob@gmail.com',
            'password' => '$2y$10$oKlOVZFuvBeNTMuf3UksOeOWM8qcge8320m5yC2BioZWY6TZjZw5O',
            'rule' => 'teacher',
        ], [
            'first_name' => 'admin',
            'last_name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$WubUd6gm5lCzS14ysdWt9u7f1TPXfll2pAO0JcqHyW5Igd2WgsNiy',
            'rule' => 'admin',
        ], [
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => '$2y$10$oKlOVZFuvBeNTMuf3UksOeOWM8qcge8320m5yC2BioZWY6TZjZw5O',
            'rule' => 'student',
        ], [
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => '$2y$10$oKlOVZFuvBeNTMuf3UksOeOWM8qcge8320m5yC2BioZWY6TZjZw5O',
            'rule' => 'student',
        ], [
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => '$2y$10$oKlOVZFuvBeNTMuf3UksOeOWM8qcge8320m5yC2BioZWY6TZjZw5O',
            'rule' => 'student',
        ], [
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => '$2y$10$oKlOVZFuvBeNTMuf3UksOeOWM8qcge8320m5yC2BioZWY6TZjZw5O',
            'rule' => 'student',
        ]];
        DB::table('users')->insert($users);
    }
}
