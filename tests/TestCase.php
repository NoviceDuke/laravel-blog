<?php
namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        if(!Storage::disk('test')->has('test_database.sqlite'))
        {
            Storage::disk('test')->put('test_database.sqlite', '');
            $this->printMessage("Created test_database.sqlite at laravel-blog/database/");
        }
        return $app;
    }

    public function printMessage($message)
    {
        return print( "\r\n[".class_basename($this)."]"." ".$message."\r\n");
    }

    public function printTestStartMessage($functionName)
    {
        return print( "\r\n[".class_basename($this)."]"." ".$functionName."...\r\n");
    }

}
