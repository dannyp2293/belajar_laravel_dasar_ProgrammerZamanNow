<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testResponse(): void
    {
        $this->get('/response/hello')
        ->assertStatus(200)
        ->assertSeeText('hello response');

    }
     public function testHeader(): void
    {
        $this->get('/response/header')
        ->assertStatus(200)
        ->assertSeeText('Danny')
        ->assertSeeText('Parlin')
        ->assertHeader('Content-Type', 'application/json')
        ->assertHeader('Author', 'Programmer Zaman Now')
        ->assertHeader('App', 'Belajar Laravel');

    }
}
