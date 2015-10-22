<?php

namespace Johnnymn\Sim\Roles\Middleware;

use Closure;
use Johnnymn\Sim\Roles\Exceptions\PermissionDeniedException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param int|string $permission
     * @return mixed
     * @throws \Sim\Roles\Exceptions\PermissionDeniedException
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        if ($user->can($permission)) {
            return $next($request);
        }

        throw new PermissionDeniedException($permission);
    }
}
