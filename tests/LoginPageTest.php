<?php

namespace Tests\intefrations\pages;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 *  登入頁面集成測試.
 */
class LoginPageTest extends TestCase
{
    public function testLoginElements()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->visit('/login')
            ->see('e-mail')
            ->see('password')
            ->see('Remember Me')
            ->see('LOGIN')
            ->see('FB LOGIN');
    }
}
