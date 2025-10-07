<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Classes::create([
                'name' => 'Class ' . $i,
                'description' => 'This is Class ' . $i,
                'status' => 1,
            ]);
        }
    }
}
