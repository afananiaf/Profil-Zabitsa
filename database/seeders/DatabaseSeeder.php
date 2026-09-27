<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
            ActivitySeeder::class,
            FigureSeeder::class,
            EducationLevelSeeder::class,
            StructureSeeder::class,
            DocumentSeeder::class,
        ]);
    }
}