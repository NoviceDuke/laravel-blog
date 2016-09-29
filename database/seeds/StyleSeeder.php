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
        Style::create([
            'name'=> 'Default',                // style名稱
            'main_color'=> '#00695c',          // 主要顏色
            'css'=> 'default',                 // css的名稱
        ]);
        Style::create([
            'name'=> 'Purple',                 // style名稱
            'main_color'=> '#424242',          // 主要顏色
            'css'=> 'purple',                  // css的名稱
        ]);
        Style::create([
            'name'=> 'Red',                 // style名稱
            'main_color'=> '#5c6bc0',          // 主要顏色
            'css'=> 'red',                  // css的名稱
        ]);
        Style::create([
            'name'=> 'Blue',                 // style名稱
            'main_color'=> '#5c6bc0',          // 主要顏色
            'css'=> 'blue',                  // css的名稱
        ]);
        Style::create([
            'name'=> 'Yellow',                 // style名稱
            'main_color'=> '#f57f17',          // 主要顏色
            'css'=> 'yellow',                  // css的名稱
        ]);
        Style::create([
            'name'=> 'Green',                 // style名稱
            'main_color'=> '#43a047',          // 主要顏色
            'css'=> 'green',                  // css的名稱
        ]);
        Style::create([
            'name'=> 'Brown',                 // style名稱
            'main_color'=> '#795548',          // 主要顏色
            'css'=> 'brown',                  // css的名稱
        ]);
        Style::create([
            'name'=> 'Orange',                 // style名稱
            'main_color'=> '#e65100',          // 主要顏色
            'css'=> 'orange',                  // css的名稱
        ]);
    }
}
