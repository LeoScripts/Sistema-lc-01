<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_rendered_all_users()
    {
        $response = $this->get('/api/users');
        $response->assertOk();
    }

    public function test_store_user()
    {
        $user = [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => '123456'
        ];

        $response = $this->post('/api/users/create', $user);
        $response->assertExactJson(['Usuario cadastrado!']);
    }

    public function test_show_user()
    {
        $response = $this->get('api/users/2');
        $response->assertJsonCount(6);
    }
}
