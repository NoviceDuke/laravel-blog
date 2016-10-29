<?php

namespace App\Presenters;

use Auth;
use Carbon\Carbon;

/**
 * 輔助View的邏輯處理. Auth認證相關
 */
class AuthPresenter
{

    public function isLogin()
    {
        if(Auth::check())
            return 'true';
        else
            return 'false';
    }

}
