<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class employeeAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
     {
         if (Auth::guard('emp')->check()) {
             $userRole = Auth::guard('emp');
             if ($userRole == "emp") {
                 return $next($request);
             }
         }
         abort(403, 'Unauthorized action.');
     }
}