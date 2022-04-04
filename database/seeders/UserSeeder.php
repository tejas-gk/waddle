<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'tejas',
            'email' => 'tejasgk250@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'id' => 1,
            'remember_token' =>Str::random(10),
            'email_verified_at' => now(),
            'username'=>'kryptoknight'

        ]);
        DB::table('teams')->insert([
            'name' =>"Tejas'".'s'.' Team',
            'personal_team'=>1,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id'=>1

        ]);
        

    }
}
