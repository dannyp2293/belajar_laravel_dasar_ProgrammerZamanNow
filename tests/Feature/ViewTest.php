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
    {
        $this->get('/hello-world')
       ->assertSeeText('World Danny');
    }
   public function Testtemplate():void
    {
        $this->view('hello', ['name'=>'Danny'])
        ->assertSeeText('Hello Danny');

         $this->view('hello.world', ['name'=>'Danny'])
        ->assertSeeText('World Danny');
    }

    public function testRouteParameter():void{
        $this->get('/product/1')
        ->assertSeeText('Product 1');

        $this->get('/product/2')
        ->assertSeeText('Product 2');

         $this->get('/product/1/items/XXX')
        ->assertSeeText("Product 1, Item XXX");

         $this->get('/product/2/items/YYY')
        ->assertSeeText("Product 2, Item YYY");
    }
    public function testRouteParameterRegex():void
    {
        $this->get('/categories/100')
        ->assertSeeText('Category 100');

        $this->get('/categories/danny')
        ->assertSeeText('404 by Programmer Zaman Now');

    }
     public function testNameRoute():void
    {
        $this->get('/produk/12345')
        ->assertSeeText('Link http://localhost/products/12345');

             $this->get('/produk-redirect/12345')
        ->assertSeeText('/productc/12345');
    }


}
