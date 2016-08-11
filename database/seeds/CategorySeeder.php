<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Post;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Lyrics',
        ]);
        Category::create([
            'name' => 'Server',
        ]);
        Category::create([
            'name' => 'PHP',
        ]);
        Category::create([
            'name' => 'Android',
        ]);
        Category::create([
            'name' => 'Music',
        ]);

        // 隨機取得15篇文章，隨機加入某個分類
        $randPosts = Post::all()->random(35);
        foreach ($randPosts as $post) {
            $randCategory = Category::all()->random(1);
            $randCategory->addPost($post);
        }
    }
}
