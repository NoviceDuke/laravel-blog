<?php

namespace App\Listeners;

use App\Events\ImageWasUploaded;

class UploadListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

     /**
      * Handle the event.
      *
      * @param  ImageWasUploaded  $event
      */
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
        dd($path);
         //your code, for example resizing and cropping
    }
}
