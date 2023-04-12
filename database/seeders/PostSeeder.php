<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    // use RefreshDatabase;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Post::factory()
        //     ->count(50)
        //     ->hasPosts(1)
        //     ->create();;  
       
        Post::factory(10)->create(); 
     }
}
