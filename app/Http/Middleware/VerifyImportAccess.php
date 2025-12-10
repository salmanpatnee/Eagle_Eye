<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyImportAccess
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
        // Currently using superadmin middleware in routes
        // Future: implement more granular role-based access control
        // For now, this middleware can be used for additional validation or logging

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Additional permission checks can be added here in the future
        // Example: if (!auth()->user()->hasPermission('manage_imports')) { abort(403); }

        return $next($request);
    }
}
