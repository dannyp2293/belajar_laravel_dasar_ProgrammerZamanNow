<?php

namespace Tests\Feature;
use App\Data\Foo;

use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
       $foo1 = $this->app->make(Foo::class);
          $foo2 = $this->app->make(Foo::class);

          self::assertEquals('Foo', $foo1->sayFoo());
          self::assertEquals('Foo', $foo2->sayFoo());
          self::assertNotSame( $foo1, $foo2);
    }
}
