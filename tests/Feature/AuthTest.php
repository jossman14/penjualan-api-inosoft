<?php
declare(strict_types = 1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use JWTAuth;
use Tests\TestCase;

class AuthTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->json('POST', route('register'), [
            'name'  =>  $name = 'Test',
            'email'  =>  $email = time().'test@example.com',
            'password'  =>  $password = '123456789',
        ]);

        //Write the response in laravel.log
        \Log::info(1, ['register']);
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(201);

        // Receive our token
        // $this->assertArrayHasKey('access_token',$response->json());
        $response->assertJsonFragment(['message' => "User created successfully"]);
    }

    public function testLogin()
    {
        // Creating Users
        // Simulated landing
        $response = $this->json('POST',route('login'),$this->credential);

        //Write the response in laravel.log
        \Log::info(1, ['login']);
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);

    }

    public function test_user_profile()
    {
        $token = $this->authenticate();
        \Log::info(1, [$token]);

        //  dd($token);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route("user-profile"));

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    public function test_refresh_token()
    {
        $token = $this->authenticate();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route("refresh"));

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(201);
    }
}
