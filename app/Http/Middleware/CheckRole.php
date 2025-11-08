<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Jika belum login
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login dulu.');
        }

        // Cek role user
        if ($user->role !== $role) {
            return redirect('/no-access')->with('error', 'Kamu tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
