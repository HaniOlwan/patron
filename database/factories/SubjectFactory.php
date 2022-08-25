<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence,
            'subject_id' => $this->faker->unique()->word,
            'code' => $this->faker->unique()->randomDigit,
            'private' => $this->faker->unique()->safeEmail(),
            'description' =>  $this->faker->paragraph(),
            'user_id' => '1',
        ];
    }
}
