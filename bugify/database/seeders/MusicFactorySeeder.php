<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Music;

class MusicFactorySeeder extends Seeder
{
    public function run(): void
    {
        Music::factory()->count(1000)->create();
    }
}
