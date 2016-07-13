<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('zh_TW');
    	$posts_id = Post::all()->lists('id')->toArray();
        foreach (range(1,10) as $index) 
        {
            Comment::create([
            'content'          =>      $faker->realText($maxNbChars = 50, $indexSize = 2),
            'status'           =>      'unread',
            'author'           =>      $faker->name,
            'email'            =>      $faker->email,
            'url'              =>      $faker->url,
            'post_id'          =>      $faker->randomElement($posts_id)
      		]);
        }
    }


}
