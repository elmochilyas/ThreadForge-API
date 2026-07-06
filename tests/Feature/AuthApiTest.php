<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_and_receive_a_bearer_token(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Thread Forge',
            'email' => 'creator@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertCreated()
            ->assertJsonPath('token_type', 'Bearer')
            ->assertJsonStructure(['token', 'user' => ['id', 'name', 'email', 'created_at']])
            ->assertJsonMissingPath('user.password');
    }

    public function test_protected_routes_reject_requests_without_a_token(): void
    {
        $this->getJson('/api/me')->assertUnauthorized();
    }

    public function test_user_can_login_and_logout(): void
    {
        User::factory()->create([
            'email' => 'creator@example.com',
            'password' => 'password123',
        ]);

        $login = $this->postJson('/api/login', [
            'email' => 'creator@example.com',
            'password' => 'password123',
        ]);

        $token = $login->assertOk()->json('token');

        $this->withToken($token)
            ->postJson('/api/logout')
            ->assertOk()
            ->assertJsonPath('message', 'User logged out successfully.');
    }
}
