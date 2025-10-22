<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PharIo\Manifest\Author;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
      public function testConfig(): void
      {
        $firstName1 = config('contoh.author.first');
        $firstName2 = config::get('contoh.author.first');

        self::assertEquals($firstName1, $firstName2);
        var_dump(Config::all());

      }
      public function testConfigDependecy(): void
      {
        $config=$this->app->make('config');
        $firstName3 = $config->get('contoh.author.first');

        $firstName1 = config('contoh.author.first');
        $firstName2 = config::get('contoh.author.first');

        self::assertEquals($firstName1, $firstName2);
         self::assertEquals($firstName1, $firstName3);
        var_dump(Config::all());

      }
      public function testFacadeMock(): void
      {
        Config::shouldReceive('get')
        ->with('contoh.author.first')
        ->andReturn('Danny Keren');

        $firstName = config::get('contoh.author.first');
        self::assertEquals('Danny Keren', $firstName);
      }

}
