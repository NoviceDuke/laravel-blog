<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_email = User::all()->lists('email');
        $faker = Faker\Factory::create('zh_TW');
        DB::table('posts')->delete();
        foreach (range(1,10) as $index) 
        {
           if($index%2==0)
            $email=$users_email[0];
           else
            $email=$users_email[1];
          //$email=$faker->randomElement($users_email);
            Post::create([
            'author_email'     =>      $email,
            'title'            =>      $faker->unique()->realText(rand(10,15)),
            'content'          =>      $faker->realText($maxNbChars = 200, $indexSize = 2),
            'tags'             =>      '測試用tag',
            'pic_url'          =>      $faker->url,
            'slug'             =>      $faker->unique()->slug,

                
      ]);

        }
    }
}
