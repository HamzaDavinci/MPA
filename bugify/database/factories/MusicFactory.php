<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Band;
use App\Models\Browse;

class MusicFactory extends Factory
{
    protected $model = \App\Models\Music::class;

    public function definition()
    {
        $band = Band::create([
            'name' => $this->faker->unique()->company(),
        ]);

        return [
            'title' => $this->faker->unique()->catchPhrase(),
            'bio' => $this->faker->sentence(10),
            'duration' => $this->faker->numberBetween(120, 300),
            'release_date' => $this->faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),

            'band_id' => $band->id,

            'genre_id' => Browse::inRandomOrder()->first()?->id,

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
