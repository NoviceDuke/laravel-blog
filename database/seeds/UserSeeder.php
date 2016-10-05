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
        $faker = Faker\Factory::create('en_EN');
        $hchs = User::create([
                'email' => 'g9308370@hotmail.com',
                'name' => 'hchs',
                'password' => bcrypt('123456'),
                'about_me' => $faker->realText($maxNbChars = 800, $indexSize = 2),
            ]);
        $duke = User::create([
                'email' => 'duke00360753@gmail.com',
                'name' => 'duke',
                'password' => bcrypt('123456'),
                'about_me' => $faker->realText($maxNbChars = 800, $indexSize = 2),
            ]);
        $author = User::create([
                    'email' => 'author@gmail.com',
                    'name' => 'author',
                    'password' => bcrypt('123456'),
                    'about_me' => $faker->realText($maxNbChars = 800, $indexSize = 2),
                ]);
        $user = User::create([
                'email' => 'user@gmail.com',
                'name' => 'user',
                'password' => bcrypt('123456'),
                'about_me' => $faker->realText($maxNbChars = 800, $indexSize = 2),
            ]);

        $hchs->attachRole(Role::findName('SuperRoot'));
        $duke->attachRole(Role::findName('SuperRoot'));
        $author->attachRole(Role::findName('Author'));
    }
}
