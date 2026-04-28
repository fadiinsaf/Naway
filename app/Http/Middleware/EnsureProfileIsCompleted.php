<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileIsCompleted
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && !$request->user()->is_profile_completed) {
            return redirect()->route('profile.complete');
        }

        return $next($request);
    }
}
