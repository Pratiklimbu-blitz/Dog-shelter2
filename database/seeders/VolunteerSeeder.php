<?php

namespace Database\Seeders;

use Database\Factories\VolunteerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $volunteers = VolunteerFactory::new()->count(50)->create();

    }
}
