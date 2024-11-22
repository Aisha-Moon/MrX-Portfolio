<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResumesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resumes')->insert([
            [
                'downloadLink' => 'https://example.com/resume1.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
