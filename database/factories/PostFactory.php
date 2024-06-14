<?php

namespace Database\Factories;

use\Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(5, true);
        return [
            'title'              => $title,
            'slug'               => Str::slug($title, '-'),
            'body'               => $this->faker->paragraphs(3, true),
            'featured_image'     => $this->faker->randomElement(['featured-image1.png', 'featured-image2.png', 'featured-image3.png'])
        ];
    }
}
