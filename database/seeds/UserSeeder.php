<?php

use Illuminate\Database\Seeder;
use App\Accounts\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
                'email' => 'g9308370@hotmail.com',
                'name' => 'hchs',
                'password' => '123456',
            ]);
        User::create([
                'email' => 'duke00360753@gmail.com',
                'name' => 'duke',
                'password' => '123456',
            ]);

        foreach (DB::table('users')->get() as $user) {
            DB::table('users')
        ->where('id', $user->id)
        ->update(array('password' => Hash::make($user->password)));
        }
    }
}
