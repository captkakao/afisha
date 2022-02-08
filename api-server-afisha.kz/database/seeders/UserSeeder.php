<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' =>  1,
                'first_name' => 'Fiko',
                'last_name' => 'Joy',
                'email' => 'fikojoy@gmail.com',
                'password' => bcrypt('qweqwe123'),
                'phone' => '77471540609',
                'email_verified_at' => now(),
            ],
            [
                'id' =>  2,
                'first_name' => 'Adam',
                'last_name' => 'Joy',
                'email' => 'adamjoy@gmail.com',
                'password' => bcrypt('qweqwe123'),
                'phone' => '77079718178',
                'email_verified_at' => now(),
            ],
        ];
        User::insert($users);
    }
}
