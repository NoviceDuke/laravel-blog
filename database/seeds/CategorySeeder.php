<?php

use Illuminate\Database\Seeder;
use App\Articles\Category;
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
            'css_class' => 'red',
        ]);
        Category::create([
            'name' => 'Server',
            'css_class' => 'blue',
        ]);
        Category::create([
            'name' => 'PHP',
            'css_class' => 'yellow',
        ]);
        Category::create([
            'name' => 'Android',
            'css_class' => 'green',
        ]);
        Category::create([
            'name' => 'Music',
            'css_class' => 'purple',
        ]);

        // 隨機取得15篇文章，隨機加入某個分類
        $randArticles = Article::all();
        foreach ($randArticles as $article) {
            $randCategory = Category::all()->random(1);
            $randCategory->addArticle($article);
        }
    }
}
