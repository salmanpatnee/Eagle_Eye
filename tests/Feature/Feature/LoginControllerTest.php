<?php

namespace Tests\Feature\Feature;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(): User
    {
        $role = UserRole::create(['role_name' => 'User']);

        return User::factory()->create(['role_id' => $role->id]);
    }

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_successful_login_redirects_to_vciso_by_default(): void
    {
        $user = $this->createUser();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $response->assertRedirect('/vciso');
    }

    public function test_successful_login_redirects_to_intended_url(): void
    {
        $user = $this->createUser();

        // Simulate visiting a protected page first (sets the intended URL in session)
        $this->get('/content/list');

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $response->assertRedirect('/content/list');
    }

    public function test_login_fails_with_invalid_credentials(): void
    {
        $this->createUser();

        $response = $this->post('/login', [
            'username' => 'wronguser',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }
}
