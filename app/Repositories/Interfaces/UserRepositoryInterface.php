<?php

namespace App\Repositories\Interfaces;

use LaravelEasyRepository\Repository;

interface UserRepositoryInterface extends Repository{

    public function register($request);
    public function authenticate($request);
    public function logout();

}
