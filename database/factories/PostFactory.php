<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'title' => $this->faker->text(60),
            'description' => $this->faker->paragraph(),
            'content' => $this->faker->paragraph(15),
            'category_id' => rand(1, 5),
        ];
    }
}
