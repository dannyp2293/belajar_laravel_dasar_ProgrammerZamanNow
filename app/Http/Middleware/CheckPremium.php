<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPremium
{
   public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login dulu.');
        }

        if (!$user->is_premium) {
            return redirect('/upgrade')->with('error', 'Akses premium hanya untuk pengguna berbayar.');
        }

        return $next($request);
    }
}
