<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rating;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition(): array
    {
        return [
            'property_id' => $this->faker->numberBetween(4, 103),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'opinion' => $this->faker->sentence(10),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
