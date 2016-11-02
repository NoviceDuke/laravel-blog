<?php
namespace Tests\units\features;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testRedirectToLogin()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->visit('/login')
             ->see('Login');
    }
}
