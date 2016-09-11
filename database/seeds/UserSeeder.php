<?php

use Illuminate\Database\Seeder;
use App\Accounts\User;
use App\Accounts\Permission\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $hchs = User::create([
                'email' => 'g9308370@hotmail.com',
                'name' => 'hchs',
                'password' => bcrypt('123456'),
            ]);
        $duke = User::create([
                'email' => 'duke00360753@gmail.com',
                'name' => 'duke',
                'password' => bcrypt('123456'),
            ]);
        $user = User::create([
                'email' => 'user@gmail.com',
                'name' => 'user',
                'password' => bcrypt('123456'),
            ]);

        $hchs->attachRole(Role::findName('SuperRoot'));
        $duke->attachRole(Role::findName('SuperRoot'));
        $user->attachRole(Role::findName('Author'));
    }
}
