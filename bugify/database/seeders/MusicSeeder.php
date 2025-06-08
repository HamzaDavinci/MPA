<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    public function run()
    {
        $genreMusic = [
            'Broken Beats' => [
                [
                    'title' => 'Call of Silence',
                    'bio' => 'An emotional track from a powerful scene.',
                    'duration' => 235,
                ],
                [
                    'title' => 'YouSeeBIGGIRL/T:T',
                    'bio' => 'A well-known track with dramatic buildup.',
                    'duration' => 251,
                ],
                [
                    'title' => 'Ashes on The Fire',
                    'bio' => 'Theme from The Final Season with tension and sorrow.',
                    'duration' => 198,
                ],
            ],
            '404 Hits' => [
                [
                    'title' => 'Before Lights Out',
                    'bio' => 'Dark tones and soft piano for late-night reflection.',
                    'duration' => 214,
                ],
                [
                    'title' => 'Barricades',
                    'bio' => 'A mix of fear and hope, perfect for battle scenes.',
                    'duration' => 205,
                ],
                [
                    'title' => 'The Other Side of the Sea',
                    'bio' => 'Emotional theme about loss and distance.',
                    'duration' => 228,
                ],
            ],
            'Laggy Loops' => [
                [
                    'title' => 'Vogel im Käfig',
                    'bio' => 'A powerful orchestral piece with classical influence.',
                    'duration' => 245,
                ],
                [
                    'title' => 'XL-TT',
                    'bio' => 'Intense electronic track with deep basslines.',
                    'duration' => 201,
                ],
                [
                    'title' => 'Eren the Coordinate',
                    'bio' => 'Mysterious track capturing Eren\'s unknown power.',
                    'duration' => 223,
                ],
            ],
            'Corrupt Classics' => [
                [
                    'title' => 'ətˈæk 0N tάɪtn',
                    'bio' => 'Iconic series theme with aggressive energy.',
                    'duration' => 213,
                ],
                [
                    'title' => 'Rittai Kidō',
                    'bio' => 'Symphonic track with sharp, marching rhythms.',
                    'duration' => 195,
                ],
                [
                    'title' => 'The Rumbling (TV Size)',
                    'bio' => 'Dark and menacing theme full of destruction.',
                    'duration' => 97,
                ],
            ],
            'Rock' => [
                [
                    'title' => 'The Final Season',
                    'bio' => 'Rock anthem for the final chapter.',
                    'duration' => 240,
                ],
                [
                    'title' => 'War Cry',
                    'bio' => 'Explosive guitar riffs and pounding drums.',
                    'duration' => 229,
                ],
                [
                    'title' => 'F2 2',
                    'bio' => 'Mysterious rock piece with ambient layers.',
                    'duration' => 216,
                ],
            ],
            'Pop' => [
                [
                    'title' => 'Name of Love',
                    'bio' => 'Soft pop song filled with emotional depth.',
                    'duration' => 188,
                ],
                [
                    'title' => 'Call Your Name',
                    'bio' => 'Touching song about hope and grief.',
                    'duration' => 193,
                ],
                [
                    'title' => 'DOA',
                    'bio' => 'Pop-rock track with strong vocals and tempo.',
                    'duration' => 207,
                ],
            ],
            'Jazz' => [
                [
                    'title' => 'Apple Seed',
                    'bio' => 'Light jazz with playful melodies.',
                    'duration' => 172,
                ],
                [
                    'title' => 'Bauklötze',
                    'bio' => 'Experimental jazz with layered percussion.',
                    'duration' => 200,
                ],
                [
                    'title' => 'Symphonic Suite (Part 1)',
                    'bio' => 'Jazz-classical hybrid with cinematic atmosphere.',
                    'duration' => 260,
                ],
            ],
            'Hip-Hop' => [
                [
                    'title' => 'Attack on D',
                    'bio' => 'Unique hip-hop track with anime-style samples.',
                    'duration' => 190,
                ],
                [
                    'title' => 'ətˈæk 0N RĒˈVƏLŪSHɪn',
                    'bio' => 'Rhythmic and raw, full of revolution energy.',
                    'duration' => 210,
                ],
                [
                    'title' => 'The Dogs',
                    'bio' => 'Dark beat with heavy impact and aggressive tone.',
                    'duration' => 198,
                ],
            ],
            'Classical' => [
                [
                    'title' => 'Erwin’s Charge',
                    'bio' => 'Epic orchestral piece with military rhythm.',
                    'duration' => 222,
                ],
                [
                    'title' => 'Zero Eclipse',
                    'bio' => 'Dramatic classical theme with emotional peaks.',
                    'duration' => 245,
                ],
                [
                    'title' => 'The World Has Yet to Know',
                    'bio' => 'Finale-style theme with a message of hope.',
                    'duration' => 234,
                ],
            ],
        ];

        foreach ($genreMusic as $genreName => $musicList) {
            $genre = DB::table('genres')->where('name', $genreName)->first();

            if ($genre) {
                foreach ($musicList as $musicData) {
                    DB::table('music')->insert([
                        'title' => $musicData['title'],
                        'bio' => $musicData['bio'],
                        'duration' => $musicData['duration'],
                        'genre_id' => $genre->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
