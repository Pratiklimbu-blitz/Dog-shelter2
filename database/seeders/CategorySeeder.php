<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run()
    {
//        Category::factory(10)->create();
        Category::upsert([
            ['type'                      => 'Labrador'],
            ['type'                      => 'German Shepherd'],
            ['type'                      => 'Spike'],
            ['type'                      => 'Thunder Bolt'],
            ['type'                      => 'Himalayan Bhotey'],
            ['type'                      => 'Scooby Doo'],
        ],['type'],[]);
    }
}
