<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna saat ini memiliki salah satu peran yang diperbolehkan
        if ($request->user() && in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki peran yang diperbolehkan, redirect atau tampilkan pesan error sesuai kebutuhan
        abort(403, 'Unauthorized');
    }
}
