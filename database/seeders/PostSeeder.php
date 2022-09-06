<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Sluggable\SlugOptions;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(2)->create();
    }
}
