<?php

namespace App\Presenters;

use Carbon\Carbon;

class ErrorsSessionPresenter
{
    /**
     * 輔助View的邏輯處理.
     */
    public function getFormatedMessage($errors)
    {
        $message = '';
        foreach ($errors->all() as $error) {
            $message = $message.$error."<br>";
        }
        return $message;
    }
}
