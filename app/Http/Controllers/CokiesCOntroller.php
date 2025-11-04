<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CokiesCOntroller extends Controller
{
       public function createCookie(Request $request): Response
    {
        return response('Hello Cookie')
            ->cookie('User-Id', 'Danny', 1000, '/')
            ->cookie('Is-Member', 'true', 1000, '/');
    }

    public function getCookie(Request $request): JsonResponse
    {
        return response()->json([
            'userId'   => $request->cookie('User-Id', 'guest'),
            'isMember' => $request->cookie('Is-Member', 'false'),
        ]);
    }
    public function clearCookie(Request $request): Response
    {
        return response('Clear cookies')
        ->withoutCookie("User-Id")
        ->withoutCookie("Is-Member");
    }
}
