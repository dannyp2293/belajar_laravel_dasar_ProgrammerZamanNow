<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
   public function testCreateSession(): void
   {
    $this->get('/session/create')
    ->assertSeeText("OK")
    ->assertSessionHas("userId", "danny")
    ->assertSessionHas("isMember", true);
   }
   public function testGetSession(): void
   {
    $this->withSession([
        'userId' => 'danny',
        'isMember' => 'true'
    ])->get('/session/get')
    ->assertSeeText("User Id : danny, Is Member : true");
   }
   public function testGetSessionFailed(): void
   {
    $this->withSession([])->get('/session/get')
    ->assertSeeText("User Id : guest, Is Member : false");
   }
}
