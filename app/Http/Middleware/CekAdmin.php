<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login-admin');
        }
        // Simpan data user pada variabel $user
        $user = Auth::guard('admin')->user();
        // Jika user memiliki peran sesuai dengan yang diizinkan, lanjutkan permintaan
        if ($user) {
            return $next($request);
        }
        // Jika tidak memiliki akses, kembalikan ke halaman sebelumnya (jika ada), jika tidak, kembalikan ke halaman login
        return redirect()->intended('login-admin')->with('error', 'Maaf, Anda tidak memiliki akses.');
    }
}