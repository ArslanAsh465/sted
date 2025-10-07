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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seeder for Country, States, Citites
        $this->call(LocationSeeder::class);

        // Seeder for classes from Class 1 to Class 10
        $this->call(ClassesSeeder::class);

        // Seeder for Exam Categories
        $this->call(ExamCategorySeeder::class);

        // Test Seeder
        $this->call(TestSeeder::class);
    }
}
