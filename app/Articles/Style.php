<?php

namespace App\Articles;

use App\Core\Eloquent;

class Style extends Eloquent
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/

    /**
     * 表名稱.
     */
    protected $table = 'styles';

    /**
     * 多形中介表名稱.
     */
    private $pivot_table = 'styleables';


    protected $fillable = [
        'name',                 // style名稱
        'main_color',           // 主要顏色
        'support_color',        // 次要顏色
        'css',                  // css的名稱
    ];


    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    /**
    * 取得所有擁有Style的Category模型。
    */
    public function categories()
    {
        return $this->morphedByMany(Category::class, $this->pivot_table);
    }
}
