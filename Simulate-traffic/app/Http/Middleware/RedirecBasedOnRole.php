<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirecBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si no está autenticado, redirigir a la ruta home
        if (!Auth::check()) {
            return redirect()->route('home');
        }
    
        // Verificar el rol del usuario
        $role = Auth::user()->role;
    
        // Redirigir según el rol
        switch ($role) {
            case 'admin':
                return redirect()->route('Administrador.dashboard');
            case 'supervisor':
                return redirect()->route('Supervisor.dashboard');
            case 'monitor':
                return redirect()->route('Monitoreo.dashboard');
            default:
                return $next($request);  // Si no coincide con ningún rol, continuar con la solicitud
        }
    }
    
}
