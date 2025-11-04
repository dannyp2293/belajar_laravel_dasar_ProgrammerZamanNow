<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CokiesCOntrollerTest extends TestCase
{
public function testCreateCookies()
    {
        $this->get('/cookie/set')
            ->assertSeeText('Hello Cookie')
            ->assertCookie('User-Id', 'Danny')
            ->assertCookie('Is-Member', 'true');
    }

    public function testGetCookies()
    {
        $this->withCookie('User-Id', 'Danny')
             ->withCookie('Is-Member', 'true')
             ->get('/cookie/get')
             ->assertJson([
                 'userId'   => 'Danny',
                 'isMember' => 'true',
             ]);
    }
}
