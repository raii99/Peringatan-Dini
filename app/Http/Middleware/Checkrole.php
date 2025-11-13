<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek jika user tidak login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Cek jika user memiliki role yang diizinkan
        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized access. Your role: ' . $user->role . '. Required: ' . implode(', ', $roles));
        }

        return $next($request);
    }
}