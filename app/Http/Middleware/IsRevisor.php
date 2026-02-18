<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_revisor === true) {
            return $next($request);
        }

        // Se non è revisore → reindirizza con messaggio
        return redirect('/home')
            ->with('error', 'Accesso riservato solo ai revisori.');
    }
}