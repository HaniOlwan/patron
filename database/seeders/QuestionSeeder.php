<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            // Stack
            [
                'title' => "Define Stack",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'is a container of objects that are inserted and removed according to the last-in first-out (LIFO) principle',
                'correct_answer' => 'd',
                'subject_id' => '1', // data structure
                'teacher_id' => '8',
                'topic_id' => '1',
            ],
            [
                'title' => "Why and when should I use Stack or Queue data structures instead of Arrays/Lists?",
                'first_answer' => 'Because they help manage your data in more a particular way than arrays and lists.',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'is a container of objects that are inserted and removed according to the last-in first-out (LIFO) principle',
                'correct_answer' => 'a',
                'subject_id' => '1', // data structure
                'teacher_id' => '8',
                'topic_id' => '1',
            ],
            [
                'title' => "Explain why Stack is a recursive data structure",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'a stack is either empty or it consists of a top and the rest which is a stack by itself',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'b',
                'subject_id' => '1', // data structure
                'teacher_id' => '8',
                'topic_id' => '1',
            ],

            // Linked List
            [
                'title' => "Define Linked List",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'A linked list is a linear data structure where each element is a separate object.',
                'correct_answer' => 'd',
                'subject_id' => '1', // data structure
                'teacher_id' => '8',
                'topic_id' => '2',
            ],
            [
                'title' => " Name some advantages of Linked List",
                'first_answer' => 'Linked Lists are Dynamic Data Structure',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'is a container of objects that are inserted and removed according to the last-in first-out (LIFO) principle',
                'correct_answer' => 'a',
                'subject_id' => '1', // data structure
                'teacher_id' => '8',
                'topic_id' => '2',
            ],

            // Queue
            [
                'title' => "What is Queue?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'A queue is a container of objects (a linear collection) that are inserted and removed according to the first-in first-out (FIFO) principle.',
                'correct_answer' => 'd',
                'subject_id' => '1', // data structure
                'teacher_id' => '8',
                'topic_id' => '3',
            ],
            [
                'title' => "What is Complexity Analysis of Queue operations?",
                'first_answer' => 'Linked Lists are Dynamic Data Structure',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'Queues offer random access to their contents by shifting the first element off the front of the queue.',
                'correct_answer' => 'a',
                'subject_id' => '1', // data structure
                'teacher_id' => '8',
                'topic_id' => '3',
            ],

            // Network Equipment
            [
                'title' => "What does network mean?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'A network consists of multiple computers, tablets or smartphones that communicate with each other.',
                'correct_answer' => 'd',
                'subject_id' => '3', // Computer networking
                'teacher_id' => '9',
                'topic_id' => '7',
            ],
            [
                'title' => "How do you secure a computer network?",
                'first_answer' => 'here are many simple ways to ensure that a computer network is safe at all times.',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'a',
                'subject_id' => '3', // Computer networking
                'teacher_id' => '8',
                'topic_id' => '7',
            ],

            // Wireless Networking
            [
                'title' => "What does HTTP mean?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'HTTP stands for HyperText Transfer Protocol.',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'b',
                'subject_id' => '3', // Computer networking
                'teacher_id' => '9',
                'topic_id' => '7',
            ],
            [
                'title' => "What is bandwidth?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Bandwidth refers to the maximum transfer rate of data from a network device.',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'c',
                'subject_id' => '3', // Computer networking
                'teacher_id' => '8',
                'topic_id' => '7',
            ],

            // Data Mining
            [
                'title' => "Explain the process of KDD?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Data mining treat as a synonym for another popularly used term, Knowledge Discovery from Data, or KDD. ',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'b',
                'subject_id' => '3', // Data Mining
                'teacher_id' => '9',
                'topic_id' => '4',
            ],
            [
                'title' => "What is bandwidth?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Bandwidth refers to the maximum transfer rate of data from a network device.',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'c',
                'subject_id' => '3', // Data Mining
                'teacher_id' => '8',
                'topic_id' => '5',
            ],
            [
                'title' => "Explain Evolution and deviation analysis?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Data evolution analysis describes and models regularities or trends for objects whose behavior variations over time.',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'c',
                'subject_id' => '3', // Data Mining
                'teacher_id' => '8',
                'topic_id' => '6',
            ],

            // Discrete Math
            [
                'title' => "What is Discrete Math?",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Discrete mathematics is the study of mathematical structures that are fundamentally discrete rather than continuous.',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'b',
                'subject_id' => '6', // Discrete Math
                'teacher_id' => '9',
                'topic_id' => '16',
            ],
            [
                'title' => "Power set of empty set has exactly _____ subset.",
                'first_answer' => 'One',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'a',
                'subject_id' => '6', // Discrete Math
                'teacher_id' => '8',
                'topic_id' => '17',
            ],
            [
                'title' => "The set O of odd positive integers less than 10 can be expressed by ___________ .",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => '{1, 3, 5, 7, 9}',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'c',
                'subject_id' => '6', // Discrete Math
                'teacher_id' => '8',
                'topic_id' => '18',
            ],
            [
                'title' => "A _______ is an ordered collection of objects.",
                'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'third_answer' => 'Set',
                'forth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum temporibus ad nihil!',
                'correct_answer' => 'c',
                'subject_id' => '6', // Discrete Math
                'teacher_id' => '8',
                'topic_id' => '19',
            ]
        ];
        DB::table('questions')->insert($questions);
    }
}
