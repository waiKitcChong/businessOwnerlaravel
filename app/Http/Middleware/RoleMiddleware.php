<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        $role = session('role');

        if (!$role) {
            return response("Please login before entering the dashboard!", 403);
        }

        if (!in_array($role, $allowedRoles)) {
            return response("Access denied: your role ($role) cannot access this page.", 403);
        }

        return $next($request);
    }
}
