<?php

use Weingut\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $role = Role::create([
            'id' => 1,
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'User has access to all system functionality'
        ]);
        
        //seed table role_user
        $role->attachPermissions([1,2,3,4]); // array of role ids
        
        $role = Role::create([
            'id' => 2,
            'name' => 'manager',
            'display_name' => 'Shop Keeper',
            'description' => 'User can create create data in the system'
        ]);
        
        //seed table role_user
        $role->attachPermissions([2,3]); // array of role ids
        
    }
}

