<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1=User::create([
            'name'=>'ahmed',
            'email'=>'alkasaby145@gmail.com',
            'password'=>Hash::make('ahmed145'),
            'role'=>'doner',
            'is_admin'=>0,
            'address'=>'mansoura',
            'latitude'=>"12345",
            'longitude'=>"23344",
            'region_id' => Region::inRandomOrder()->first()->id,
            'city_id' => Region::inRandomOrder()->first()->city_id,
            'password'=>Hash::make('ahmed145')

        ]);

        $user1->devices()->create([
            'token'=>'ejOniAmlTpG5lIXIXUnO4k:APA91bGvlWeTgdVmLURxyost4hQeeC5ecLp5sbsWQYalaDMNXa8IJSIkdsVw69BPVJsB5tFKuzP9Y2AWFKxzCEBkqNtvAVfYsDfuT4xJq91VZLCxeXJQb1o',
            'device_type'=>'android',
            'imei'=>'12345'
        ]);

        $user1->addRole('doner');

    }
}
