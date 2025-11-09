<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlGenerationTest extends TestCase
{
    /** @test */
    public function halaman_home_bisa_dibuka()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Contoh URL Helper');
    }

    /** @test */
    public function halaman_profile_bisa_dibuka()
    {
        $response = $this->get('/profile');
        $response->assertStatus(200);
        $response->assertSee('profil user');
    }

    /** @test */
    public function halaman_user_show_menampilkan_id()
    {
        $response = $this->get('/user/5');
        $response->assertStatus(200);
        $response->assertSee('ID: 5');
    }

    /** @test */
    public function halaman_user_edit_menampilkan_id()
    {
        $response = $this->get('/user/7/edit');
        $response->assertStatus(200);
        $response->assertSee('ID: 7');
    }

    /** @test */
    public function link_dan_action_di_home_menghasilkan_url_valid()
    {
        $response = $this->get('/');
        $response->assertSee(url('profile'));
        $response->assertSee(route('user.show', ['id' => 10]));
        $response->assertSee(route('user.edit', ['id' => 10]));
        $response->assertSee(action([\App\Http\Controllers\UserControllerUrlGenerations::class, 'profile']));
    }
}
