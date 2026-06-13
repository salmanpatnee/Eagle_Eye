<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPaymentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        if ($user->id === 1 || $user->role_id === 1) {
            return $next($request);
        }

        if (! $user->hasActivePayment()) {
            return redirect()->route('payment.pricing')
                ->with('error', 'Your subscription has expired or payment is required.');
        }

        return $next($request);
    }
}
