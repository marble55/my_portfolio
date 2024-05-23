<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class AntiSpamThrottle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $maxAttempts = 3, $decayMinutes = 5): Response
    {
        $key = $request->ip();

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)){
            return redirect()->back()->with("error","Sending too many messages. Try again later");
        }

        RateLimiter::hit($key, $decayMinutes * 60);
        
        return $next($request);
    }
}
