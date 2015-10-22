<?php

namespace Johnnymn\Sim\Roles\Middleware;

use Closure;
use Johnnymn\Sim\Roles\Exceptions\RoleDeniedException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param int|string $role
     * @return mixed
     * @throws \Sim\Roles\Exceptions\RoleDeniedException
     */
    public function handle($request, Closure $next, $role)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        if ($user->is($role)) {
            return $next($request);
        }

        throw new RoleDeniedException($role);
    }
}
