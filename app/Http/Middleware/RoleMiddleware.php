<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if(auth()->check() && auth()->user()->hasAnyRole($roles)) {
            return $next($request);
        }
        return redirect()->route('login.index')->with('error', 'Unauthorized access');
    }
}
