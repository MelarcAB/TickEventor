<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Repositories\User\Contracts\UserRepositoryInterface;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_a_user_can_register(): void
    {
        $user = [
            'name' => 'Tester User',
            'email' => 'johndoe@test.com',
            'password' => 'password123!',
            'password_confirmation' => 'password123!'
        ];
        $response = $this->postJson('/api/register', $user);
        $response->assertStatus(201);
         $this->assertDatabaseHas('users', [
             'name' => $user['name'],
             'email' => $user['email']
         ]);
    }


    //test user registration with missing data
    public function test_user_registration_with_missing_data(): void
    {
        $user1 = [
            'name' => 'Tester User',
            'email' => 'johndoe@test.com',
            'password' => 'password123!',
        ];

        $user2 = [
            'name' => 'Tester User',
            'password' => 'password123!',
            'password_confirmation' => 'password123!'
        ];

        $response = $this->postJson('/api/register', $user1);
        $response->assertStatus(422);

        $response = $this->postJson('/api/register', $user2);
        $response->assertStatus(422);
    }


    //register with email that already exists
    public function test_user_registration_with_existing_email(): void
    {
        $email = 'johndoe@test.com';
        $user = [
            'name' => 'Tester User',
            'email' =>  $email,
            'password' => 'passworD123!',
            'password_confirmation' => 'passworD123!'
        ];

        $user2 = [
            'name' => 'Tester2 User2',
            'email' =>  $email,
            'password' => 'PPassword123!',
            'password_confirmation' => 'PPassword123!'
        ];
        
        $response = $this->postJson('/api/register', $user);
        $response->assertStatus(201);

        $response = $this->postJson('/api/register', $user2);
        $response->assertStatus(422);
    }

    //register with password that does not match
    public function test_user_registration_with_password_mismatch(): void
    {
        $user = [
            'name' => 'Tester User',
            'email' => 'johndoe@test.com',
            'password' => 'Pasword123!!!',
            'password_confirmation' => 'afssdPassword123!!!'
        ];

        $response = $this->postJson('/api/register', $user);
        $response->assertStatus(422);

    }

        




}
