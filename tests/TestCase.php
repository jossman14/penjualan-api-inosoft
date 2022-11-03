<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use JWTAuth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public $credential = [
        'email' => "admin@admin.com",
        'password' => 'password',
    ];
    protected function authenticate()
    {

        return $accessToken = JWTAuth::attempt($this->credential);

    }
}
