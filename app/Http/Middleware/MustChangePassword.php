<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MustChangePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated - if not, let the auth middleware handle it
        if (Auth::check()) {
            $user = Auth::user();

            // Check if user needs to change password, is not an admin, and is not on exempted routes
            // Admin users (role_id = 1) are exempt from the password change requirement
            if ($user->must_change_password &&
                $user->role_id != 1 &&
                !$request->is('profile') &&
                !$request->is('profile*') &&
                !$request->is('logout')) {

                return redirect()->route('profile.edit')->with('info', 'Please update your password to continue.');
            }
        } else {
            // If user is not authenticated, pass through to auth middleware
            // which will handle redirecting to login page
        }

        return $next($request);
    }
}
