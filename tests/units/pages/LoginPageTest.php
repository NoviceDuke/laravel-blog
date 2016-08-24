<?php

namespace Tests\units\pages;

use Tests\TestCase;

/**
 *  登入頁面單元測試.
 */
class LoginPageTest extends TestCase
{
    /**
     * 經過Auth MiddleWare的路徑重導至login頁面.
     */
    public function testRedirectToLogin()
    {
        $this->visit('/')
            ->seePageIs('/login');

        $this->visit('/blog')
            ->seePageIs('/login');
        // 後台路徑應該也要重導，但還沒寫
        // $this->visit('/backend')
        //     ->seePageIs('/login');
    }
    public function testLoginElements()
    {
        $this->visit('/login')
            ->see('e-mail')
            ->see('password')
            ->see('Remember Me')
            ->see('LOGIN')
            ->see('FB LOGIN');
    }
}
