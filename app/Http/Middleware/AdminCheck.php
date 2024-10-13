<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth::guard('admin')->check()) {
            $userRole = Auth::guard('admin')->user()->role;
            if ($userRole == "admin") {
                return $next($request);
            }
        }
        return redirect()->intended('admin/login');
        //abort(403, 'Unauthorized action.');
    }
}
