<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use LaravelEasyRepository\Service;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserService extends Service {

     /**
     * don't change $this->mainInterface variable name
     * because used in extends service class
     */
     protected $mainInterface;

    public function __construct(UserRepositoryInterface $mainInterface)
    {
      $this->mainInterface = $mainInterface;
    }

    public function register($request){
        return $this->mainInterface->register($request);

    }
    public function authenticate($request){
        $token = $this->mainInterface->authenticate($request);

        try {
            if (!$token) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }

        return $token;

    }

    public function logout(){

        try {
            $logout = $this->mainInterface->logout();
            return $logout;
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
