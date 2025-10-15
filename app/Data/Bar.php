<?php
namespace App\Data;
use App\Data\Foo;

class Bar
{
    private Foo $foo;

public function __construct(Foo $foo)
{
    $this->foo = $foo;
}
public function gbar(): string
{
return $this->foo->SayFoo() . ' and Bar';
}


}
