<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_rendered_welcome()
    {
        $response = $this->get('/api');
        $response->assertStatus(200);
    }

    public function test_not_rendered_welcome()
    {
        $response = $this->get('/');
        $response->assertNotFound();
    }

    public function test_message_welcome()
    {
        $response = $this->get('/api');
        $response->assertExactJson(['Seja bem vindo ao LC 01']);
    }
}
