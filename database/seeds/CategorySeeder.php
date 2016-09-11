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
            'slug' => str_slug('Lyrics', '-'),
        ]);
        Category::create([
            'name' => 'Server',
            'css_class' => 'blue',
            'slug' => str_slug('Server', '-'),
        ]);
        Category::create([
            'name' => 'PHP',
            'css_class' => 'yellow',
            'slug' => str_slug('PHP', '-'),
        ]);
        Category::create([
            'name' => 'Android',
            'css_class' => 'green',
            'slug' => str_slug('Android', '-'),
        ]);
        Category::create([
            'name' => 'Music',
            'css_class' => 'purple',
            'slug' => str_slug('Music', '-'),
        ]);

        // 隨機取得15篇文章，隨機加入某個分類
        $randArticles = Article::all();
        foreach ($randArticles as $article) {
            $randCategory = Category::all()->random(1);
            $randCategory->addArticle($article);
        }
    }
}
