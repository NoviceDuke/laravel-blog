<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('zh_TW');
        DB::table('posts')->delete();
        foreach (range(1,10) as $index) 
        {
            Post::create([

            'author_email'     =>      $faker->email,
            'title'            =>      $faker->realText(rand(10,15)),
            'content'          =>      $faker->realText($maxNbChars = 200, $indexSize = 2),
            'tags'             =>      '測試用tag',
            'pic_url'          =>      $faker->url,
                
      ]);

        }
    }
}
