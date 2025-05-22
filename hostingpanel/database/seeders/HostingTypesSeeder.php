<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::table('hosting_types')->insert([
            ['name' => 'Game Hosting'],
            ['name' => 'Web Hosting'],
            ['name' => 'Private Server Hosting'],
        ]);
    }

}
