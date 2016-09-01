<?php

namespace App\Http\Helpers;

/**
 * 讓Controller能夠直接使用Alert.
 *
 * 主要是用Seesion的方式存入變數，在Blade內判斷是否存有指定的Session，並做適當輸出.
 */
trait Alertable
{
    private $key = 'alert_message';
    private $title = 'default title';
    private $message = 'Hi Im Default Alert!';
    private $level = 'info';

    /**
     * 初始化SweetAllert.
     *
     * 可選擇傳進標題、內容資訊，填入null表示該變數使用預設值
     *
     * @return $this
     */
    public function alert($title = null, $message = null)
    {
        $this->title = $title ?: $this->title;
        $this->message = $message ?: $this->message;

        return $this;
    }

    /**
     * 將變數Flash存進Session Defaul key = alert_message.
     *
     * 可以選擇傳進Arg指定Session key;
     */
    public function flashIt($key = null)
    {
        $this->key = $key ?: $this->key;

        return session()->flash($this->key, [
            'title' => $this->title,
            'message' => $this->message,
            'level' => $this->level,
        ]);
    }

    /**
     * 魔術方法.
     *
     * 可以使用method name指定其level值
     * 目前SweetAllert支援 : "warning", "error", "success" and "info"
     */
    public function __call($level, $args)
    {
        $support = [
            'warning',
            'error',
            'success',
            'info',
        ];
        if (in_array($level, $support)) {
            $this->level = $level;
        } else {
            throw new \Exception("Error SweetAllert Type $level");
        }

        return $this;
    }
}
