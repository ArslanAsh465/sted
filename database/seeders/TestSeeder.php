<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\InstituteProfile;
use App\Models\TeacherProfile;
use App\Models\ParentProfile;
use App\Models\StudentProfile;
use App\Models\Center;
use App\Models\Exam;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admins
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'email'             => "admin$i@sted.com",
                'username'          => "admin$i",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 1,
                'is_verified'       => true,
            ]);
        }

        // Moderators
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'email'             => "moderator$i@sted.com",
                'username'          => "moderator$i",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 2,
                'is_verified'       => true,
            ]);
        }

        // Institutes
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'email'             => "institute$i@sted.com",
                'username'          => "institute$i",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 3,
                'is_verified'       => true,
            ]);

            InstituteProfile::create([
                'user_id'             => $user->id,
                'name'                => "Institute $i",
                'principal_name'      => "Principal $i",
                'mobile_no'           => "03001234$i$i",
                'whatsapp_no'         => "03001234$i$i",
                'website'             => "www.institute$i.com",
                'registration_number' => "REG00" . rand(111, 999),

                'address'     => "Block $i, City Center",
                'city_id'     => rand(1, 57),
                'state_id'    => 1,
                'country_id'  => 1,
                'postal_code' => rand(11111, 99999),
            ]);
        }

        // Teachers
        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'email'             => "teacher$i@sted.com",
                'username'          => "teacher$i",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 4,
                'is_verified'       => true,
            ]);

            TeacherProfile::create([
                'user_id'        => $user->id,
                'institute_id'   => rand(1, 10),
                'first_name'     => "TeacherFirst$i",
                'last_name'      => "TeacherLast$i",
                'phone'          => "03111234$i$i",
                'qualification'  => "MSc Subject $i",
                'specialization' => "Specialization $i",

                'address'     => "Street $i, Education Town",
                'city_id'     => rand(1, 57),
                'state_id'    => 1,
                'country_id'  => 1,
                'postal_code' => rand(11111, 99999),
            ]);
        }

        // Parents
        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'email'             => "parent$i@sted.com",
                'username'          => "parent$i",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 5,
                'is_verified'       => true,
            ]);

            ParentProfile::create([
                'user_id'    => $user->id,
                'first_name' => "ParentFirst$i",
                'last_name'  => "ParentLast$i",
                'phone'      => "03221234$i$i",

                'address'     => "House $i, Family Block",
                'city_id'     => rand(1, 57),
                'state_id'    => 1,
                'country_id'  => 1,
                'postal_code' => rand(11111, 99999),
            ]);
        }

        // Students
        for ($i = 1; $i <= 100; $i++) {
            $user = User::create([
                'email'             => "student$i@sted.com",
                'username'          => "student$i",
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 6,
                'is_verified'       => true,
            ]);

            StudentProfile::create([
                'user_id'       => $user->id,
                'parent_id'     => rand(1, 20),
                'first_name'    => "StudentFirst$i",
                'last_name'     => "StudentLast$i",
                'roll_no'       => "ROLL00$i",
                'date_of_birth' => now()->subYears(15 + $i)->format('Y-m-d'),

                'address'     => "Street $i, Student Colony",
                'city_id'     => rand(1, 57),
                'state_id'    => 1,
                'country_id'  => 1,
                'postal_code' => rand(11111, 99999),
            ]);
        }

        // Centers
        for ($i = 1; $i <= 10; $i++) {
            Center::create([
                'name'        => 'Center #' . $i,
                'status'      => rand(0, 1),
                'address'     => "Street $i, Exam Avenue",
                'city_id'     => rand(1, 57),
                'state_id'    => 1,
                'country_id'  => 1,
                'postal_code' => rand(11111, 99999),
            ]);
        }

        // Exams
        for ($i = 1; $i <= 10; $i++) {
            Exam::create([
                'exam_category_id' => rand(1, 3),
                'class_id'         => rand(1, 10),
                'user_id'          => 1,
                'name'             => 'Exam #' . $i,
                'description'      => 'This is a description for Exam #' . $i,
                'fee'              => rand(100, 1000),
                'status'           => rand(0, 1),
                'date'             => now()->addDays($i),
            ]);
        }

        // Attach centers to exams in pivot table
        for ($examId = 1; $examId <= 10; $examId++) {
            $numCenters = rand(1, 10);

            $centerIds = collect(range(1, 10))->random($numCenters)->toArray();

            foreach ($centerIds as $centerId) {
                DB::table('center_exam')->insert([
                    'exam_id'    => $examId,
                    'center_id'  => $centerId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
