<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Article;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tags')->delete();
        $articles = Article::all();
        foreach (range(1, 20) as $value) {
            // 產生各Tag
            // firstOrCreate : 搜尋資料庫如，果沒有符合的就建立並存檔，如果有，回傳抓到的第一個結果
            $laravelTag = Tag::firstOrCreate([
               'name' => 'Laravel',
            ]);
            $rorTag = Tag::firstOrCreate([
               'name' => 'ROR',
            ]);
            $ubuntuTag = Tag::firstOrCreate([
               'name' => 'Ubuntu',
            ]);
            $cssTag = Tag::firstOrCreate([
               'name' => 'CSS',
            ]);
            $htmlTag = Tag::firstOrCreate([
               'name' => 'Html',
            ]);

            //各tag建立一次關聯
            $laravelTag->addArticle($articles->random(1));
            $rorTag->addArticle($articles->random(1));
            $ubuntuTag->addArticle($articles->random(1));
            $cssTag->addArticle($articles->random(1));
            $htmlTag->addArticle($articles->random(1));
        }
    }
}
