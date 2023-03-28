<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Answer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $question_id = 1;
        $user = 1;
        return [
            'body' => $this->faker->randomElement(['respuesta 1', 'Respuesta 2', 'Respuesta 3', 'Respuesta 4']),
            'question_id' => $question_id,
            'user_id' => $user,
        ];
    }
}
