<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function test_example()
    {
        $foo = new Foo();
        $bar = new Bar($foo);

        self::assertEquals('Foo and Bar', $bar->gbar());
    }
}
