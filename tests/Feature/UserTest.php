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
        $response->assertExactJson(['message' => 'Usuario cadastrado!']);
    }

    public function test_show_user()
    {
        $response = $this->get('api/users/2');
        $response->assertJsonCount(7);
    }

    public function test_update_user()
    {
        $user = $this->get('api/users/2');
        $user->assertJsonCount(7);

        $response = $this->put('api/users/2/update', [
            'name' => 'ana test'
        ]);
    }

    public function test_delete_user()
    {
        $response = $this->delete('api/users/19/delete');
        $response->assertExactJson(['message' => 'Usuario excluido!']);
    }
}
