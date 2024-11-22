<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('education')->insert([
            [
                'duration' => '2014-2018',
                'instituteName' => 'University of XYZ',
                'field' => 'Computer Science',
                'details' => 'Completed a Bachelor\'s degree in Computer Science.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duration' => '2012-2014',
                'instituteName' => 'ABC High School',
                'field' => 'Science',
                'details' => 'Completed Higher Secondary Education in Science.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
