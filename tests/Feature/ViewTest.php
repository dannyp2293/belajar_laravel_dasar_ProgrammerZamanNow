<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
       $this->get('/hello')
       ->assertSeeText('Hello Danny');

          $this->get('/hello-again')
       ->assertSeeText('Hello Danny');
    }
    public function testViewNested(): void
}
