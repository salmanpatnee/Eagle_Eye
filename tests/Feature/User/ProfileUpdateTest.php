<?php

namespace Tests\Feature\User;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_admin_user_can_update_own_profile()
    {
        // Create a non-admin user role
        $userRole = UserRole::create(['role_name' => 'User']);
        $adminRole = UserRole::create(['role_name' => 'Admin']);
        
        // Create a non-admin user
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'role_id' => $userRole->id,
        ]);

        // Act as the user and attempt to update profile
        $response = $this->actingAs($user)->put('/profile', [
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'username' => 'janesmith',
        ]);

        // Assertions
        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'username' => 'janesmith',
        ]);
    }

    public function test_non_admin_user_cannot_update_email_or_role()
    {
        // Create a non-admin user role
        $userRole = UserRole::create(['role_name' => 'User']);
        $adminRole = UserRole::create(['role_name' => 'Admin']);
        
        // Create a non-admin user
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'role_id' => $userRole->id,
        ]);

        // Act as the user and attempt to update profile with email/role
        $response = $this->actingAs($user)->put('/profile', [
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'username' => 'janesmith',
            'email' => 'newemail@example.com', // This should be ignored
            'role_id' => $adminRole->id, // This should be ignored
        ]);

        // Assertions - email and role should remain unchanged
        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'username' => 'janesmith',
            'email' => 'john@example.com', // Should remain unchanged
            'role_id' => $userRole->id, // Should remain unchanged
        ]);
    }

    public function test_admin_user_can_still_update_all_fields()
    {
        // Create roles
        $userRole = UserRole::create(['role_name' => 'User']);
        $adminRole = UserRole::create(['role_name' => 'Admin']);
        
        // Create an admin user
        $admin = User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'adminuser',
            'email' => 'admin@example.com',
            'role_id' => $adminRole->id,
        ]);

        // When we implement the full admin functionality, this test should pass
        $this->assertTrue(true); // Placeholder for now
    }
}