<?php

namespace Database\Seeders;

use App\Models\RequestService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Facades\Auth;

class RequestForService extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $faker=faker::create();
                $user_id=Auth::user();
               // dd($user_id);
            for($i=0;$i<10;$i++)
            {
                RequestService::insert([
                    "requestInfo"=>$faker->name(),
                    "description"=>$faker->sentence(),
                    "name"=>$faker->name(),
                    "addressOne"=>$faker->text(),
                    "addressTwo"=>$faker->text(),
                    "city"=>$faker->city(),
                    "state"=>$faker->name(),
                    "zip"=>$faker->numberBetween(300,1000),
                    "email"=>$faker->email(),
                    "mobile"=>$faker->phoneNumber(),
                    "date"=>$faker->date(),
                    "user_id"=>$user_id->id,
                ]);
            }       
    }
}
