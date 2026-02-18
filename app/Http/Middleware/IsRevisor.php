<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    
public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_revisor) {
            return $next($request);
        }

        // return abort(403, 'Accesso riservato ai revisori');

        return redirect('/')
            ->with('error', 'Devi essere revisore per accedere a questa area.');
    }
}

// public function handle(Request $request, Closure $next): Response
//     {
//         if (auth()->check() && auth()->user()->is_revisor) {
    
    
    
//         }

//         // return abort(403, 'Accesso riservato ai revisori');

//         return redirect('/')
//             ->with('error', 'Devi essere revisore per accedere a questa area.');
//     }
// }
   