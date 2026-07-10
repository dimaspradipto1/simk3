<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == 'admin' ||
            Auth::user()->role == 'hsemanger' ||
            Auth::user()->role == 'supervisor' ||
            Auth::user()->role == 'kontraktor' ||
            Auth::user()->role == 'paramedis' ||
            Auth::user()->role == 'timtanggapdarurat' ||
            Auth::user()->role == 'direksi' ||
            Auth::user()->role == 'auditor' ||
            Auth::user()->role == 'karyawan') {
            return $next($request);
        }
        return $next($request);
    }
}
