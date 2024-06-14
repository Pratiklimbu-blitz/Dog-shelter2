<?php

namespace Database\Factories;

use App\Constants\DogStatus;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dog>
 */
class DogFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = array_keys(DogStatus::LIST);
        $selectedStatus = array_rand($status);
        return [
            'name'        => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'status'      => $status[$selectedStatus],
            'image'       => null,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
