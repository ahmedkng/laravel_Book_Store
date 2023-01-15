<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(),
            'description'=> $this->faker->paragraph,
            'image' => file_get_contents('public/assets/img/book_1.jpg'),
            'price' => $this->faker->numberBetween(100, 1000),  
        ];
    }
}