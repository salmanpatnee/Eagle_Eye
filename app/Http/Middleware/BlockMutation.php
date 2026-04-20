<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockMutation
{
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->routeIs('login.destroy')) {
            return $next($request);
        }

        $roleId = auth()->user()?->role_id;
        $method = $request->method();

        if ($roleId === 3 && in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            return redirect()->back()->with('error', 'Viewers cannot modify data.');
        }

        if ($roleId === 4 && $method === 'DELETE') {
            return redirect()->back()->with('error', 'You do not have permission to delete records.');
        }

        return $next($request);
    }
}
