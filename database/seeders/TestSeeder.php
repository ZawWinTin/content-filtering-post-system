<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersCount = 10;
        $postsCount = 30;

        User::factory($usersCount)->create();

        Post::factory($postsCount)->create();
    }
}
