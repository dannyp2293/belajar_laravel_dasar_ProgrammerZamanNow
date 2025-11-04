<?php

namespace Tests\Feature;

use App\Http\Controllers\RedirectController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRedirect(): void
    {
        $this->get('/redirect/from')
        ->assertRedirect('/redirect/to');
    }

    public function testRedirectName()
    {
        $this->get('/redirect/name')
        ->assertRedirect('/redirect/name/Danny');
    }

    public function testRedirectAction()
    {
        $this->get('/redirect/action')
        ->assertRedirect('/redirect/name/Danny');
    }

    public function tesdtRedirectAction ()

    {
        $this->get('/redirect/away')
        ->assertRedirect('https://www.programmerzamanow.com/');
    }


}
