<?php

namespace Database\Factories;

use App\Constants\VolunteerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Volunteer>
 */
class VolunteerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'description' => $this->faker->text,
            'phone_number' => $this->faker->optional()->phoneNumber,
            'status' => VolunteerStatus::REQUESTED
        ];
    }
}
