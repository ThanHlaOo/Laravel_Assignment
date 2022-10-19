<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'email' => 'thanhlaoo1999@gmail.com',
            'phone' => '09777777',
            'address' => 'insein',
            'gender' => 'male',
            'major_id' => rand(1, 3),
        ];
    }
}
