<?php

namespace Database\Seeders;

use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Post::upsert([
            [
                'title'             => 'Contact',

                'description'              => 'reerj erjknjfkejr erekjfker erfjkr kertker krtgjkgtr trkg.',
                'image'    => '',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'title'             => 'About',

                'description'              => 'jerfgjer tugjrktg rrjkgtvkr ritjgvkrgtfvn iojgvg.',
                'image'    => '',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ], ['title'], [ 'description', 'image']);

    }
}
