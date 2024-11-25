<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(ExperienceSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(ResumesSeeder::class);
        $this->call(HeroPropertiesSeeder::class);
        $this->call(AboutsSeeder::class);
    }
}
