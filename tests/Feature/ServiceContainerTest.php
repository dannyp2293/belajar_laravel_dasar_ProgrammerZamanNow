<?php

namespace Tests\Feature;
use App\Data\Foo;
use App\Data\Person;
use App\Data\Bar;
use App\Services\HelloService;
use Tests\TestCase;
use App\Services\HelloServiceIndonesia;


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
    public function testBind(): void
{

   $this->app->bind(Person::class, function($app){
    return new Person ("Danny", "Parlin");
   });
     $person1 = $this->app->make(Person::class); //closure() // new Peson("danny", "Parlin");
     $person2 = $this->app->make(Person::class); //closure() // new Peson("danny", "Parlin");


     self::assertEquals("Danny", $person1->firstName);
     self::assertEquals("Danny", $person2->firstName);
     self::assertNotSame($person1, $person2);

}
   public function testSingeleton(): void
{

   $this->app->singleton(Person::class, function($app){
    return new Person ("Danny", "Parlin");
   });
     $person1 = $this->app->make(Person::class); //closure() // new Peson("danny", "Parlin"); if notexitst
     $person2 = $this->app->make(Person::class); //return existing
     $person3 = $this->app->make(Person::class); //return existing


     self::assertEquals("Danny", $person1->firstName);
     self::assertEquals("Danny", $person2->firstName);
     self::assertSame($person1, $person2);

}
   public function testInstance(): void
{

   $person = new Person("Danny", "Khannedy");
   $this->app->instance(Person::class, $person);

     $person1 = $this->app->make(Person::class); //person
     $person2 = $this->app->make(Person::class); //person
     $person3 = $this->app->make(Person::class); //person



     self::assertEquals("Danny", $person1->firstName);
     self::assertEquals("Danny", $person2->firstName);
     self::assertSame($person1, $person2);

}

public function testDependencyInjection(): void
{
    $this->app->singleton(Foo::class, function ($app) {
        return new Foo();
    });

    $foo = $this->app->make(Foo::class);
    $bar1 = $this->app->make(Bar::class);
    $bar2 = $this->app->make(Bar::class);

    self::assertSame($foo, $bar1->getFoo());
    self::assertNotSame($bar1, $bar2);
}
public function testInterfaceToClass(): void
    {
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals('Halo Danny', $helloService->hello('Danny'));
    }



}
