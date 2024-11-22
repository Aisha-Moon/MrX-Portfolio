<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hero_properties')->insert([
            
            [
                'keyLine' => 'Empowering Businesses',
                'title' => 'Digital Solutions for Modern Problems',
                'short_title' => 'Business Solutions',
                'image' => 'https://example.com/images/hero2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
