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
}
