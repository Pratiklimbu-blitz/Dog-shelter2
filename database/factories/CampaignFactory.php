<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageFileName = $this->faker->image('public/storage/uploads/campaigns', 640, 480, null, false);
            return [
                'title' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
                'start_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
                'end_date' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
                'collected_amount' => $this->faker->numberBetween(100, 1000),
                'poster' => $imageFileName,
//                'participant_id' => function () {
//                    return factory(App\Models\User::class)->create()->id;
//                },
            ];
    }
}
