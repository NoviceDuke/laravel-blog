<?php

namespace App\Presenters;

use Request;
use URL;

class FloatingButtonPresenter
{
    /**
     * 輔助View的邏輯處理.
     */
    public function getFloatinButton()
    {
        $htmlString = '';

        /*
         * 主按鈕樣式判別
         */
        switch (Request::path()) {
            case 'article/create': // 新增文章的送出按鈕 Onclick綁定 JS
                $htmlString .=
                '<a id="article_create_submit" class="btn-floating btn-large blue" onclick="article_create_submit();">
                     <i class="large material-icons floating-fix" >done</i>
                 </a>';
                break;
            case 'blog':          // 無功能的三條線選單樣式
                $htmlString .=
                '<a id="float_menu" class="btn-floating btn-large red">
                    <i class="large material-icons floating-fix" >view_headline</i>
                </a>';
                break;
            default:              // Default狀況都是返回上一頁
                $htmlString .=
                '<a id="float_previous" href="'.URL::previous().'" class="btn-floating btn-large green">
                    <i class="large material-icons floating-fix" >chevron_left</i>
                </a>';
                break;
        }

        /*
         * 次要按鈕樣式判別
         */
        $htmlString .= '<ul>';
        switch (Request::path()) {

            case 'blog': // 這裡沒有brak是因為在首頁的時候兩個按鈕都要
                $htmlString .= '
                <li><a class="btn-floating blue" href="article/create">
                    <i class="material-icons floating-fix">create</i></a>
                </li>';
            default:
                $htmlString .= '
                <li><a class="btn-floating green" id="btn-floating-green">
                    <i class="material-icons floating-fix">publish</i></a>
                </li>
                </ul>';
                break;
        }

        return $htmlString;
    }
}
