<?php

use Illuminate\Database\Seeder;
use App\Articles\Comment;
use App\Articles\Article;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_EN');
        $faker->seed(rand(1,999));
        $articles_id = Article::all()->lists('id')->toArray();
        foreach (range(1, 10) as $index) {
            Comment::create([
            'content' => $faker->realText($maxNbChars = 50, $indexSize = 2),
            'status' => 'unread',
            'author' => $faker->name,
            'email' => $faker->email,
            'url' => $faker->url,
            'article_id' => $faker->randomElement($articles_id),
            ]);
        }
    }
}
