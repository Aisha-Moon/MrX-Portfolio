<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiences')->insert([
            [
                'duration' => '2020-2022',
                'title' => 'Software Developer',
                'designation' => 'Junior Developer',
                'details' => 'Worked on various web development projects.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duration' => '2018-2020',
                'title' => 'Intern',
                'designation' => 'Intern',
                'details' => 'Assisted in frontend and backend tasks.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
