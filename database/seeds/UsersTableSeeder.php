<?php
use Illuminate\Database\Seeder;
use Weingut\Models\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $user = User::create([
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        
        //seed table role_user
        $user->roles()->sync(1); // array of role ids
        
        $user = User::create([
            'id' => '2',
            'name' => 'testuser',
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        //seed table role_user
        $user->roles()->sync(2); // array of role ids
    }
}
