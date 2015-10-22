<?php

namespace Johnnymn\Sim\Roles\Middleware;

use Closure;
use Johnnymn\Sim\Roles\Exceptions\LevelDeniedException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyLevel
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param int $level
     * @return mixed
     * @throws \Bican\Roles\Exceptions\LevelDeniedException
     */
    public function handle($request, Closure $next, $level)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        if ($user->level() >= $level) {
            return $next($request);
        }

        throw new LevelDeniedException($level);
    }
}
