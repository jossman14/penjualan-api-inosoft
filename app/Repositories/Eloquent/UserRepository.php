<?php
declare(strict_types = 1);

namespace App\Repositories\Eloquent;

use JWTAuth;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserRepository extends Eloquent implements UserRepositoryInterface{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function register($request){
        $user = $this->model::create([
        	'name' => $request->name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
        ]);

        return $user;

    }

    public function authenticate($request)
    {
        // dd($request->email);
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        return $token;

    }
    public function logout()
    {

       return JWTAuth::invalidate(JWTAuth::getToken());

    }

    public function get_all_user(){
        $data = User::all();
        return $data;
    }
}
