<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //melakukan pengecekkan terhadap role, apakah sesuai dengan role yang melakukan login atau tidak
    //jika tidak, akan kembali ke halaman utama
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(auth()->user()->role == $role){

            return $next($request);
        }
        if(auth()->user()->role == 'admin'){

            return redirect('user/admin');
        }
        if(auth()->user()->role == 'owner'){

            return redirect('user/owner');
        }
        

    }

    
}

