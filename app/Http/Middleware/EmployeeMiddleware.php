<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/EmployeeMiddleware.php

public function handle($request, Closure $next)
{
    if (Auth::check() && Auth::guard('emp')()->isEmployee()) {
        return $next($request);
    }

    return redirect('/'); // Redirect jika bukan karyawan
}

}
