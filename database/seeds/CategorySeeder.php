<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Articles\Article;

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
        $randArticles = Article::all()->random(35);
        foreach ($randArticles as $article) {
            $randCategory = Category::all()->random(1);
            $randCategory->addArticle($article);
        }
    }
}
