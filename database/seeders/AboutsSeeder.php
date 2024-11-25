<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'title' => 'About Me',
                'details' => 'I am a passionate web developer with experience in building modern, responsive, and dynamic web applications. My expertise lies in PHP, Laravel, and creating intuitive user experiences.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'What I Do',
                'details' => 'I specialize in web development, focusing on backend architecture, RESTful APIs, and seamless integrations to deliver high-performing solutions tailored to user needs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
