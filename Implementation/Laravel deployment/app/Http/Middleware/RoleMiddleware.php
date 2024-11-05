<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (!auth()->user()) {
        throw UnauthorizedException::forRoles($roles);
    }

    // Check if user has any of the specified roles
    if (!$this->userHasAnyRole(auth()->user(), $roles)) {
        throw UnauthorizedException::forRoles($roles);
    }

    return $next($request);
}

// Helper method to check if the user has any of the roles
protected function userHasAnyRole($user, array $roles)
{
    foreach ($roles as $role) {
        if ($user->hasRole($role)) {
            return true;
        }
    }
    return false;
}

}
