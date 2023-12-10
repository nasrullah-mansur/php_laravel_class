<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for($i = 0; $i <= 10; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->unique()->safeEmail;
            $user->password = Hash::make('password');
    
            $user->save();
        }

        
    }
}
