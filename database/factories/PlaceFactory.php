<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company, // Nama tempat
            'photo' => $this->faker->imageUrl(640, 480, 'places', true, 'Faker'),
            'description' => $this->faker->sentence(10),
            'address' => $this->faker->address, // Alamat tempat
            'latitude' => $this->faker->latitude(-90, 90), // Latitude dengan range -90 hingga 90
            'longitude' => $this->faker->longitude(-180, 180), // Longitude dengan range -180 hingga 180
            'total_review' => $this->faker->numberBetween(0, 1000), // Total review antara 0 hingga 1000
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
