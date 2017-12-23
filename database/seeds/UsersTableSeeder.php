<?php

use Weingut\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'testuser',
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('password'),
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
