<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = Country::updateOrCreate(
            ['code' => 'PK'], 
            ['name' => 'Pakistan']
        );

        $state = State::updateOrCreate(
            ['name' => 'Balochistan', 'country_id' => $country->id], 
            ['code' => 'BA']
        );

        $cities = [
            ['name' => "Alik Ghund", 'state_id' => $state->id],
            ['name' => "Awārān District", 'state_id' => $state->id],
            ['name' => "Barkhan", 'state_id' => $state->id],
            ['name' => "Bārkhān District", 'state_id' => $state->id],
            ['name' => "Bela", 'state_id' => $state->id],
            ['name' => "Bhag", 'state_id' => $state->id],
            ['name' => "Chāgai District", 'state_id' => $state->id],
            ['name' => "Chaman", 'state_id' => $state->id],
            ['name' => "Chowki Jamali", 'state_id' => $state->id],
            ['name' => "Dadhar", 'state_id' => $state->id],
            ['name' => "Dalbandin", 'state_id' => $state->id],
            ['name' => "Dera Bugti", 'state_id' => $state->id],
            ['name' => "Dera Bugti District", 'state_id' => $state->id],
            ['name' => "Duki", 'state_id' => $state->id],
            ['name' => "Gadani", 'state_id' => $state->id],
            ['name' => "Garhi Khairo", 'state_id' => $state->id],
            ['name' => "Gwadar", 'state_id' => $state->id],
            ['name' => "Harnai", 'state_id' => $state->id],
            ['name' => "Jāfarābād District", 'state_id' => $state->id],
            ['name' => "Jhal Magsi District", 'state_id' => $state->id],
            ['name' => "Jiwani", 'state_id' => $state->id],
            ['name' => "Kalat", 'state_id' => $state->id],
            ['name' => "Kalāt District", 'state_id' => $state->id],
            ['name' => "Khadan Khak", 'state_id' => $state->id],
            ['name' => "Kharan", 'state_id' => $state->id],
            ['name' => "Khārān District", 'state_id' => $state->id],
            ['name' => "Khuzdar", 'state_id' => $state->id],
            ['name' => "Khuzdār District", 'state_id' => $state->id],
            ['name' => "Kohlu", 'state_id' => $state->id],
            ['name' => "Kot Malik Barkhurdar", 'state_id' => $state->id],
            ['name' => "Lasbela District", 'state_id' => $state->id],
            ['name' => "Loralai", 'state_id' => $state->id],
            ['name' => "Loralai District", 'state_id' => $state->id],
            ['name' => "Mach", 'state_id' => $state->id],
            ['name' => "Mastung", 'state_id' => $state->id],
            ['name' => "Mastung District", 'state_id' => $state->id],
            ['name' => "Mehrabpur", 'state_id' => $state->id],
            ['name' => "Mūsa Khel District", 'state_id' => $state->id],
            ['name' => "Nasīrābād District", 'state_id' => $state->id],
            ['name' => "Nushki", 'state_id' => $state->id],
            ['name' => "Ormara", 'state_id' => $state->id],
            ['name' => "Panjgūr District", 'state_id' => $state->id],
            ['name' => "Pasni", 'state_id' => $state->id],
            ['name' => "Pishin", 'state_id' => $state->id],
            ['name' => "Qila Saifullāh District", 'state_id' => $state->id],
            ['name' => "Quetta", 'state_id' => $state->id],
            ['name' => "Quetta District", 'state_id' => $state->id],
            ['name' => "Sibi", 'state_id' => $state->id],
            ['name' => "Sohbatpur", 'state_id' => $state->id],
            ['name' => "Surab", 'state_id' => $state->id],
            ['name' => "Turbat", 'state_id' => $state->id],
            ['name' => "Usta Muhammad", 'state_id' => $state->id],
            ['name' => "Uthal", 'state_id' => $state->id],
            ['name' => "Zhob", 'state_id' => $state->id],
            ['name' => "Zhob District", 'state_id' => $state->id],
            ['name' => "Ziarat", 'state_id' => $state->id],
            ['name' => "Ziārat District", 'state_id' => $state->id],
        ];

        foreach ($cities as $city) {
            City::updateOrCreate(
                ['state_id' => $city['state_id'], 'name' => $city['name']],
                $city
            );
        }
    }
}
