<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\InstituteProfile;
use App\Models\TeacherProfile;
use App\Models\ParentProfile;
use App\Models\StudentProfile;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'username' => 'adminuser',
            'password' => Hash::make('password'),
            'role' => 1,
            'is_verified' => true,
        ]);

        // Moderators
        for ($i = 1; $i <= 2; $i++) {
            User::create([
                'username' => "moderator$i",
                'password' => Hash::make('password'),
                'role' => 2,
                'is_verified' => true,
            ]);
        }

        // Institutes
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'username' => "institute$i",
                'password' => Hash::make('password'),
                'role' => 3,
                'is_verified' => true,
            ]);

            InstituteProfile::create([
                'user_id' => $user->id,
                'name' => "Institute $i",
                'address' => "Block $i, City Center",
                'phone' => "03001234$i$i",
                'email' => "institute$i@example.com",
                'website' => "www.institute$i.com",
                'registration_number' => "REG00$i",
            ]);
        }

        // Teachers
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'username' => "teacher$i",
                'password' => Hash::make('password'),
                'role' => 4,
                'is_verified' => true,
            ]);

            TeacherProfile::create([
                'user_id' => $user->id,
                'first_name' => "TeacherFirst$i",
                'last_name' => "TeacherLast$i",
                'phone' => "03111234$i$i",
                'email' => "teacher$i@example.com",
                'qualification' => "MSc Subject $i",
                'specialization' => "Specialization $i",
                'address' => "Street $i, Education Town",
            ]);
        }

        // Parents
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'username' => "parent$i",
                'password' => Hash::make('password'),
                'role' => 5,
                'is_verified' => true,
            ]);

            ParentProfile::create([
                'user_id' => $user->id,
                'first_name' => "ParentFirst$i",
                'last_name' => "ParentLast$i",
                'email' => "parent$i@example.com",
                'mobile_no' => "03221234$i$i",
                'address' => "House $i, Family Block",
            ]);
        }

        // Students
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'username' => "student$i",
                'password' => Hash::make('password'),
                'role' => 6,
                'is_verified' => true,
            ]);

            StudentProfile::create([
                'user_id' => $user->id,
                'first_name' => "StudentFirst$i",
                'last_name' => "StudentLast$i",
                'email' => "student$i@example.com",
                'roll_no' => "ROLL00$i",
                'date_of_birth' => now()->subYears(15 + $i)->format('Y-m-d'),
                'address' => "Street $i, Student Colony",
                'parent_contact' => "03221234$i$i",
            ]);
        }
    }
}
