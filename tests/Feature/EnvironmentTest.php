<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
  #[Test]
    public function it_can_read_env_value(): void
    {
        $youtube = env('YOUTUBE');
        self::assertEquals('Programmer Zaman Now', $youtube);
    }

    public function testDefaultEnv()
    {
        // $author = env('AUTHOR', 'Danny');

        $author = Env::get('AUTHOR', 'Danny');
        self::assertEquals('Danny', $author);
    }

}
