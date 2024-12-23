<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Review::class;
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'coment' => $this->faker->sentence(20),
            'pic' => $this->faker->imageUrl(200, 150, 'places', true, 'Faker'),
            'user_id' =>2,
            'place_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
