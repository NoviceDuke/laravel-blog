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
            'name' => 'Music',
        ]);
        Category::create([
            'name' => 'Code',
        ]);
        Category::create([
            'name' => 'Server',
        ]);
        Category::create([
            'name' => 'Android',
        ]);

        // 隨機取得15篇文章，隨機加入某個分類
        $randPosts = Post::all()->random(15);
        foreach ($randPosts as $post) {
            $randCategory = Category::all()->random(1);
            $randCategory->addPost($post);
        }
    }
}
