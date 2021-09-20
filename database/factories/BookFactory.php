<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_start' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time_start' => $this->faker->time($format = 'H:i', $max = 'now'),
            'date_end' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time_end' => $this->faker->time($format = 'H:i', $max = 'now'),
            'agenda' => $this->faker->word(),  
            'participant' => $this->faker->name(),
           
            'room' => $this->faker->randomElement(['Zoom 1','Zoom 2','Zoom 3','Ruang Rapat Wasdar']),

            'pic' => $this->faker->name(),
        ];
    }
}
