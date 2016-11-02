<?php

use Illuminate\Database\Seeder;
use App\Articles\Style;
class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = config('style.colors');
        foreach ($colors as $name => $color) {
            Style::create([
                'name'=> ucwords(str_replace('-',' ',$name)),                // style名稱
                'main_color'=> $color,          // 主要顏色
                'css'=> $name,                 // css的名稱
            ]);
        }
    }
}
