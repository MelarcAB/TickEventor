<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //debug info START DATABASE SEEDER
        $this->command->info('START DATABASE SEEDER');
        //llamar al EventCategorySeeder
        $this->call(EventCategoriesSeeder::class);
    }
}
