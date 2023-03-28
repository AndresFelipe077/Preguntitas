<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = 1;
        return [
            'title' => $this->faker->randomElement(['Botiquin de primeros auxilios', 'Accidentes casuales']),
            'body'  => $this->faker->randomElement(['Preguntas para niños', 'asdfasdf']),
            'user_id' => $user,
        ];
    }

}
