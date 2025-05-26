<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run()
    {
        DB::table('genres')->insert([
            ['name' => 'Broken Beats', 'description' => 'Loading... forever'],
            ['name' => '404 Hits', 'description' => 'File not found 🔥'],
            ['name' => 'Laggy Loops', 'description' => 'Please wait...'],
            ['name' => 'Corrupt Classics', 'description' => 'Playback failed'],
            ['name' => 'Rock', 'description' => 'Guitar-driven energetic music'],
            ['name' => 'Pop', 'description' => 'Popular chart-topping hits'],
            ['name' => 'Jazz', 'description' => 'Smooth and improvisational sounds'],
            ['name' => 'Hip-Hop', 'description' => 'Rhythmic beats and rhymes'],
            ['name' => 'Classical', 'description' => 'Orchestral and instrumental masterpieces'],
        ]);
    }
}
