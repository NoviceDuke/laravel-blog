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

        //預設圖片位置，來自http://www.freeimages.com/
        $array_pic_url = [
         'http://images.freeimages.com/images/previews/4a7/around-home-3-1470151.jpg',
         'http://images.freeimages.com/images/previews/df2/around-home-4-1470150.jpg',
         'http://images.freeimages.com/images/previews/44e/around-home-5-1470152.jpg',
         'http://images.freeimages.com/images/previews/926/around-the-lounge-no-1-1510762.jpg',
         'http://images.freeimages.com/images/previews/b0d/fashion-stars-1542603.jpg',
         'http://images.freeimages.com/images/previews/5a9/man-on-the-floor-1434988.jpg',
         'http://images.freeimages.com/images/previews/810/dreaming-1565050.jpg',
         'http://images.freeimages.com/images/previews/2c3/dreams-texture-5-1567009.jpg',
         'http://images.freeimages.com/images/previews/022/light-play-1-1621526.jpg',
         'http://images.freeimages.com/images/previews/583/flashlight-blue-play-1182481.jpg',
         'http://images.freeimages.com/images/previews/e21/broken-glass-1423483.jpg',
         'http://images.freeimages.com/images/previews/626/flashlight-and-led-1-1195025.jpg'
        ];

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
            'pic_url'          =>      $faker->randomElement($array_pic_url),
            'slug'             =>      $faker->unique()->slug,

                
      ]);

        }
    }
}