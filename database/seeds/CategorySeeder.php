<?php

use Illuminate\Database\Seeder;
use App\Articles\Category;
use App\Articles\Article;
use App\Articles\Style;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Lyrics',
            'slug' => str_slug('Lyrics', '-'),
        ])->useStyle(Style::findName('Red'));
        Category::create([
            'name' => 'Server',
            'slug' => str_slug('Server', '-'),
        ])->useStyle(Style::findName('Blue'));
        Category::create([
            'name' => 'PHP',
            'slug' => str_slug('PHP', '-'),
        ])->useStyle(Style::findName('Yellow'));
        Category::create([
            'name' => 'Android',
            'slug' => str_slug('Android', '-'),
        ])->useStyle(Style::findName('Green'));
        Category::create([
            'name' => 'Music',
            'slug' => str_slug('Music', '-'),
        ])->useStyle(Style::findName('Purple'));

        // 隨機取得15篇文章，隨機加入某個分類
        $randArticles = Article::all();
        foreach ($randArticles as $article) {
            $randCategory = Category::all()->random(1);
            $randCategory->addArticle($article);
        }
    }
}
