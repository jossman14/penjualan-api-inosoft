<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthenticateRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\Eloquent\UserRepository;
use JWTAuth;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    private UserService $userService;

      public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function register(UserRegisterRequest $request)
    {

        //Request is valid, create new user
        $new_user = $this->userService->register($request);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $new_user
        ], Response::HTTP_CREATED);
    }

    public function authenticate(UserAuthenticateRequest $request)
    {

        $token = $this->userService->authenticate($request);
 		//Token created, return with success response and jwt token

        return response()->json([
            'success' => true,
            'message' => 'Token Generated successfully',
            'data' => ['token' => $token],
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        $logout = $this->userService->logout();

        return response()->json([
            'success' => true,
            'message' => 'User has been logged out',
        ], Response::HTTP_OK);
    }


    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    public function get_all_user(){


        $data = $this->userService->get_all_user();
        return response()->json([
            'success' => true,
            'message' => 'Data seluruh User',
            'data' => $data,
        ], Response::HTTP_OK);
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ], Response::HTTP_CREATED);
    }
}
