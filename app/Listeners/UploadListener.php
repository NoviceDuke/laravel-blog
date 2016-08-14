<?php

namespace App\Listeners;

use Hchs\Laravelfilemanager\Events\ImageWasUploaded;

class UploadListener
{
    public function handle($event)
    {
        $method = 'on'.class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }
    }

    public function onImageWasUploaded(ImageWasUploaded $event)
    {
        $path = $event->path();
        // 檔案上傳時要做...
    }
}
