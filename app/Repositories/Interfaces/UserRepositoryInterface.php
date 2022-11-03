<?php
declare(strict_types = 1);

namespace App\Repositories\Interfaces;

use LaravelEasyRepository\Repository;

interface UserRepositoryInterface extends Repository{

    public function register($request);
    public function authenticate($request);
    public function logout();
    public function get_all_user();


}
