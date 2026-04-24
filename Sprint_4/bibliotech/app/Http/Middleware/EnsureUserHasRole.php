<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        //comprobar si está logueado y si su rol coincide con el del usuario
        if (!$request->user() || $request->user()->rol !== $role) {
            abort(403, "No tienes permiso para acceder a esta zona.");
        }

        return $next($request);
    }
}
