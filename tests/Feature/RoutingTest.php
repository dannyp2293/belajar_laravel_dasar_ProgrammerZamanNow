<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
        $this->get('/pzn')
        ->assertStatus(200)
        ->assertSeeText('Hello Programmer Zaman Now');
    }

    public function tesRedirect()
    {
        $this->get('/youtube')
        ->assertRedirect('/pzn');
    }


    public function tesFallback()
    {
        $this->get('/tidakada')
        ->assertRedirect("404 by Programmer Zaman Now");
         $this->get('/tidakada1')
        ->assertRedirect("404 by Programmer Zaman Now");
         $this->get('/tidakadalagi')
        ->assertRedirect("404 by Programmer Zaman Now");
         $this->get('/tidakadaada')
        ->assertRedirect("404 by Programmer Zaman Now");
    }
}
