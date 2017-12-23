<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('PermissionsTableSeeder');
        
        $this->command->info('Permission table seeded!');
        
        $this->call('RolesTableSeeder');
        
        $this->command->info('Role table seeded!');
        
        $this->call('UserTableSeeder');
        
        $this->command->info('User table seeded!');
    }
}
