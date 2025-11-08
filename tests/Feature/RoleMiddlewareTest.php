<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;


class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_access_admin_route()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Halo Admin');
    }

    /** @test */
    public function user_cannot_access_admin_route()
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertRedirect('/no-access');
    }
}

 // tambahkan di atas file test


