<?php
namespace App\Http\Helpers;

/**
 * 讓Controller能夠直接使用Alert.
 *
 * 主要是用Seesion的方式存入變數，在Blade內判斷是否存有指定的Session，並做適當輸出.
 */
trait Alertable
{

    function allert($message)
    {

    }
}
