<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExamCategory;

class ExamCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Science', 'description' => 'Science-related exams', 'status' => 1],
            ['name' => 'Commerce', 'description' => 'Commerce-related exams', 'status' => 1],
            ['name' => 'Arts', 'description' => 'Arts and humanities exams', 'status' => 1],
        ];

        foreach ($categories as $category) {
            ExamCategory::create($category);
        }
    }
}
