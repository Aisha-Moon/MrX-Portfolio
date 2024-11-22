<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Portfolio Website',
                'previewLink' => 'https://example.com/portfolio',
                'thumbnailLink' => 'https://example.com/thumbnail1.jpg',
                'details' => 'A personal portfolio showcasing my projects and skills.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'E-commerce App',
                'previewLink' => 'https://example.com/ecommerce',
                'thumbnailLink' => 'https://example.com/thumbnail2.jpg',
                'details' => 'An online shopping platform with payment integration.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
