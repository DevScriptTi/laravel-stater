<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        Log::info('RedirectIfAuthenticated Middleware - Guards: ' . json_encode($guards));

        foreach ($guards as $guard) {
            Log::info('Checking guard: ' . $guard);
            if (Auth::guard($guard)->check()) {
                Log::info('User is authenticated with guard: ' . $guard);
                return response()->json([
                    'message' => 'You are already authenticated.',
                ], 401); // 401 Unauthenticated
            }
        }

        Log::info('User is not authenticated. Proceeding to the next middleware/route.');
        return $next($request);
    }
}
