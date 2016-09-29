<?php

namespace App\Articles;

use App\Core\Eloquent;

class Style extends Eloquent
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $table = 'styles';
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
    * 取得所有所屬的可擁有圖片的模型。
    */
    public function styleable()
    {
        return $this->morphTo();
    }
}
