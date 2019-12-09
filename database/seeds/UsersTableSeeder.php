<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::insert(
            [
                [
                    'name' => 'Super Admin',
                    'email' => 'admin@admin.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('123qweasd'),  // secret
                    'remember_token' => str_random(10),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'User',
                    'email' => 'user@user.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('123qweasd'),  // secret
                    'remember_token' => str_random(10),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
