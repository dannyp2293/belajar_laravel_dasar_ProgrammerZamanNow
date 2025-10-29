<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(Request $request):Response
    {
        return response("hello response");
    }
    public function header (Request $request):Response
    {
        $body = [
            'firstName' => 'Danny',
            'lastName' => 'Parlin'

        ];
        return response(json_encode($body), 200)
        ->header('Content-Type', 'application/json')
        ->withHeaders([
            'Author' => 'Programmer Zaman Now',
            'App' => 'Belajar Laravel'
        ]);
    }
}
