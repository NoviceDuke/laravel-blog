<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            User::create([
                'email' => 'g9308370@hotmail.com',
                'name'  => 'hchs',
                'password' => '123456',
            ]);
            User::create([
                'email' => 'duke00360753@gmail.com',
                'name'  => 'duke',
                'password' => '123456',
            ]);
    }

    
}
