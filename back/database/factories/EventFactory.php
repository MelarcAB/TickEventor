<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'place' => $this->faker->city(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'capacity' => $this->faker->numberBetween(1, 1000),
            'image' => $this->faker->imageUrl(),
            'event_category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
