<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Rol;

class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index(Request $usuarios) {

        $usuarios = User::with('Rol')->get();
        $permisos = Rol::with('Permisos')->get();


        return view('/panel_admin/dash',compact('usuarios','permisos'));

    }

    public function agregaruser() {
        

        $usuarios = User::with('Rol')->get();


        return view('/panel_admin/agregaruser',compact('usuarios'));
    }

    public function agregando(Request $request) {

        $request->validate([
            'nombre' => 'required',
            'email' => 'required|unique:users,email',
            'rol' => 'required',
            'contraseña' => 'required'
        ]);

        switch($request->rol){
            case "Administrador":
                $rol = 1;
                break;
            case "Operador":
                $rol = 2;
                break;
            case "Sin asignar":
                $rol = 3;
                break;
            default:
                return back()->with('mensaje', 'Error');
        }
        

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->save();

        $usuario->rol()->attach($rol);
        
        return back()->with('mensaje_success', 'Usuario Agregado');

}
}