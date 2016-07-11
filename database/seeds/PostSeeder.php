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
        DB::table('posts')->delete();
        Post::create([

      	 'author_email'	   	=> 		'g9308370@hotmail.com',
      	 'title'            =>      'Seeder自動建立標題',
         'content'          =>      'asdwqsxxxxmmmmm!!!!!我在測試Seeder自動建立content',
         'tags'             => 		'測試用tag',
         'pic_url'          => 		'www.google.com',
        	    
      ]);
    }
}
