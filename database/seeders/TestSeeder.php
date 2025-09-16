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
            'email' => 'adminuser@sted.com',
            'username' => 'adminuser',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 1,
            'is_verified' => true,
        ]);

        // Moderators
        for ($i = 1; $i <= 2; $i++) {
            User::create([
                'email' => "moderator$i@sted.com",
                'username' => "moderator$i",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 2,
                'is_verified' => true,
            ]);
        }

        // Institutes
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'email' => "institute$i@sted.com",
                'username' => "institute$i",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 3,
                'is_verified' => true,
            ]);

            InstituteProfile::create([
                'user_id' => $user->id,
                'name' => "Institute $i",
                'principal_name' => "Principal $i",
                'mobile_no' => "03001234$i$i",
                'whatsapp_no' => "03001234$i$i",
                'website' => "www.institute$i.com",
                'address' => "Block $i, City Center",

                'city_id' => rand(1, 57),
                'state_id' => 1,
                'country_id' => 1,
                'postal_code' => 12345 + $i,

                'registration_number' => "REG00$i",
            ]);
        }

        // Teachers
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'email' => "teacher$i@sted.com",
                'username' => "teacher$i",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 4,
                'is_verified' => true,
            ]);

            TeacherProfile::create([
                'user_id' => $user->id,
                'institute_id' => $i,
                'first_name' => "TeacherFirst$i",
                'last_name' => "TeacherLast$i",
                'phone' => "03111234$i$i",
                'qualification' => "MSc Subject $i",
                'specialization' => "Specialization $i",
                'address' => "Street $i, Education Town",
                'city_id' => rand(1, 57),
                'state_id' => 1,
                'country_id' => 1,
                'postal_code' => 54321 + $i,
            ]);
        }

        // Parents
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'email' => "parent$i@sted.com",
                'username' => "parent$i",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 5,
                'is_verified' => true,
            ]);

            ParentProfile::create([
                'user_id' => $user->id,
                'first_name' => "ParentFirst$i",
                'last_name' => "ParentLast$i",
                'phone' => "03221234$i$i",
                'address' => "House $i, Family Block",
                'city_id' => rand(1, 57),
                'state_id' => 1,
                'country_id' => 1,
                'postal_code' => 10000 + $i,
            ]);
        }

        // Students
        for ($i = 1; $i <= 3; $i++) {
            $user = User::create([
                'email' => "student$i@sted.com",
                'username' => "student$i",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 6,
                'is_verified' => true,
            ]);

            StudentProfile::create([
                'user_id' => $user->id,
                'parent_id' => $i,
                'first_name' => "StudentFirst$i",
                'last_name' => "StudentLast$i",
                'roll_no' => "ROLL00$i",
                'date_of_birth' => now()->subYears(15 + $i)->format('Y-m-d'),
                'address' => "Street $i, Student Colony",
                'city_id' => rand(1, 57),
                'state_id' => 1,
                'country_id' => 1,
                'postal_code' => 10000 + $i,
            ]);
        }
    }
}
