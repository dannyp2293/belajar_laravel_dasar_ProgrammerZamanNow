<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
      $firstName = config('contoh.author.first');
      $lastName = config('contoh.author.last');
      $email = config('contoh.email');
      $web=config('contoh.web');

    self::assertEquals('Danny',$firstName );
    self::assertEquals('Parlin',$lastName );
    self::assertEquals('dany@mail.com',$email );
    self::assertEquals('https:kosong',$web );


    }
}
