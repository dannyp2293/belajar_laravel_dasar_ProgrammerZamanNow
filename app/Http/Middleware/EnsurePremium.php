<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EnsurePremium
{
    /**
     * Parameter opsional:
     *  - graceDays: jumlah hari toleransi setelah expired (default 0)
     *    contoh pemakaian: ->middleware('premium:3')
     */
    public function handle(Request $request, Closure $next, int $graceDays = 0)
    {
        $u = $request->user();
        if (!$u) {
            // belum login → silakan sesuaikan mau redirect ke login atau abort
            return redirect()->guest(route('login'));
        }

        $isPremiumFlag = (bool)($u->is_premium ?? false);

        $notExpired = false;
        if (!empty($u->subscription_ends_at)) {
            $end = Carbon::parse($u->subscription_ends_at);
            $notExpired = $end->copy()->addDays($graceDays)->isFuture();
        }

        if (!($isPremiumFlag || $notExpired)) {
            return redirect('/subscribe')
                ->with('error', 'Akses premium diperlukan. Yuk berlangganan!');
        }

        return $next($request);
    }
}
