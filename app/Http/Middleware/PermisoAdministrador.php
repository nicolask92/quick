<?php

namespace App\Http\Middleware;

use Closure;
use App\Rol;

class PermisoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->permiso()){
        return $next($request);
        }
        else{
        return redirect('/')->with('mensaje', 'No tienes los privilegios para entrar ahí');
         }
        
    }

    private function permiso() {
        return session()->get('rol_nombre') == 'Administrador';
    }
}
