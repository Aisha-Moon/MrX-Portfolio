<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('socials')->insert([
            [
                'twitterLink' => 'https://x.com/AishaAkterMoon',
                'githubLink' => 'https://github.com/Aisha-Moon',
                'linkedinLink' => 'https://www.linkedin.com/in/aisha-akter-moon/',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
