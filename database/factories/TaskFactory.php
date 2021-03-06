<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'detail' => $this->faker->text( 100 ),
            'day' => random_int( 0, 6 ),
            'time' => $this->faker->dateTimeBetween( now(), now()->addDays( 6 ) )->format( 'H:i' ),
        ];
    }
}
