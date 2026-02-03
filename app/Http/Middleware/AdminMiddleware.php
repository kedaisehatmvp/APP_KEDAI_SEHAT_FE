<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Please login.'
            ], 401);
        }

        // Jika tidak ada role yang ditentukan, cukup cek apakah user adalah admin
        if (empty($roles)) {
            if (!$user->id_admin && $user->role !== 'superadmin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Access denied. Admin only.'
                ], 403);
            }
            
            return $next($request);
        }

        // Cek apakah user memiliki salah satu role yang diizinkan
        $hasAccess = false;
        
        foreach ($roles as $role) {
            if ($user->role === $role || $user->role === 'superadmin') {
                $hasAccess = true;
                break;
            }
        }

        if (!$hasAccess) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Required role: ' . implode(', ', $roles)
            ], 403);
        }

        return $next($request);
    }
}