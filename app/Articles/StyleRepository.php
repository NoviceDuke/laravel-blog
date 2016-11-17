<?php

namespace App\Articles;

use App\Core\EloquentRepository;
use App\Accounts\User;

/**
 *  負責處理 Style Query的邏輯.
 */
class StyleRepository extends EloquentRepository
{
    /**
     * @var Style
     */
    protected $model;

    /**
     *  建構子依賴注入 Style.
     *
     *  @param Style::class
     */
    public function __construct(Style $style)
    {
        $this->model = $style;
    }
    /*------------------------------------------------------------------------**
    ** 自訂函數方法                                                            **
    **------------------------------------------------------------------------*/
    

}
