<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testMiddlewareInvalid(): void
    {
        $this->get('/midlleware/api')
        ->assertStatus(401)
        ->assertSeeText("Access Denied");
    }
    public function testMiddlewareValid(): void
    {
        $this->withHeader('X-API-KEY', 'PZN')
        ->get('/middleware/api')
        ->assertStatus(200)
        ->assertSeeText("OK");
    }
}
