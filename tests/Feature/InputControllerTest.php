<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Danny')
        ->assertSeeText('Hello Danny');

        $this->post('/input/hello',[
            'name' => 'Danny'
        ])->assertSeeText('Hello Danny');
    }
    public function testInputNested()
    {
        $this->post('input/hello/first',[
            "name"=>[
            "first"=> "Danny",
            "last"=> "parlin"
        ]
        ])->assertSeeText("Hello Danny");
    }
    public function testInputAll()
    {
        $this->post('input/hello/input',[
            "name"=>[
            "first"=> "Danny",
            "last"=> "Parlin"
        ]
        ])
        ->assertSeeText("name")
        ->assertSeeText("first")
        ->assertSeeText("last")
        ->assertSeeText("Danny")
        ->assertSeeText("Parlin");
    }
    public function testArrayinput()
    {
        $this->post('/input/hello/array',[
            'products' => [
                ['name' => 'Apple Mac Book Pro',
                 "price" => 3000000 ],
                ['name' => 'Samsung Galaxy S10',
                 "price"=> 200000]
            ]
        ])
        ->assertSeeText('Apple  Mac Book Pro')
        ->assertSeeText('Samsung Galaxy S10');
    }
    public function testInputType()
    {
        $this->post('/input/type',
        [
            'name' => 'Budi',
            'married' => 'true',
            'birth_date' => '1998-10-10'
        ])->assertSeeText('Budi')->assertSeeText("true")->assertSeeText("1998-10-10");
    }

    //filter Request INput
    public function testfilterOnly()
    {
        $this->post('/input/filter/only',[
        "name" =>
        [
          "first"  => "Danny",
          "middle" => "Parlin",
          "last"   => "Butar-Butar"
        ]
        ])
            ->assertSeeText("Danny")
            ->assertSeeText("Parlin")
            ->assertSeeText("Butar-Butar");
    }
    public function testfilterExcept()
    {
        $this->post('/input/filter/only',[
        "name" =>
        [
          "username"  => "Danny",
          "password" => "rahasia",
          "admin"   => "true"
        ]
        ])
            ->assertSeeText("Danny")
            ->assertSeeText("rahasia")
            ->assertSeeText("admin");
    }
       public function testfilterMerge()
    {
        $this->post('/input/filter/merge',[
        "name" =>
        [
          "username"  => "Danny",
          "password" => "rahasia",
          "admin"   => "true"
        ]
        ])
            ->assertSeeText("Danny")
            ->assertSeeText("rahasia")
            ->assertSeeText("admin")
            ->assertSeeText("false");
    }
}
