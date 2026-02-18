<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Revisor
{

public function handle(Request $request, Closure $next): Response
    {
        // Controllo se l'utente è autenticato (già fatto da 'auth', ma per sicurezza)
        if (! Auth::check()) {
            return redirect()->route('login'); // o dove vuoi reindirizzare
        }

// Controllo se è revisore
        // Opzione 1: campo booleano semplice nella tabella users
        if (Auth::user()->is_revisor !== true) {
            // return abort(403, 'Non sei autorizzato come revisore.');
            return redirect('/home')->with('error', 'Accesso riservato ai revisori.');
        }






    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
        return $next($request);
    }
}
