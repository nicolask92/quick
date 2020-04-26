<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class AdministracionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Clientes
    public function agregar_cliente() {

        $clientes = App\Clientes::all();

        return view('administracion.clientes', compact('clientes'));
        }

    public function agregado_cliente(Request $request) {

        $request->validate([
            'cliente' => 'required',
            'tipo_cliente' => 'required',
            'razon_social' => 'required',
            'cuit' => 'required',
            'factura' => 'required'
        ]);

        $cliente = new App\Clientes;

        $cliente->cliente = $request->cliente;
        $cliente->tipo_cliente = $request->tipo_cliente;
        $cliente->razon_social = $request->razon_social;
        $cliente->cuit = $request->cuit;
        $cliente->tipo_f = $request->factura;
        
        $cliente->save();

        return back()->with('mensaje_success', 'Cliente Agregado');
            }


    // Tarifas
    public function agregar_tarifas() {
        return view('administracion.tarifas');
    }


    // Moviles
    public function agregar_moviles() {

        $movil_lista = App\Movil::all();

        return view('administracion.moviles',compact('movil_lista'));
    }

    public function agregado_moviles(Request $request) {

        $request->validate([
            'movil' => 'required',
            'celular' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'relacion' => 'required'
            ]);

        $movil = new App\Movil;

        $movil->movil = $request->movil;
        $movil->celular = $request->celular;
        $movil->marca = $request->marca;
        $movil->modelo = $request->modelo;
        $movil->relacion = $request->relacion;
        
        $movil->save();

        return back()->with('mensaje_success', 'Movil Agregado');
            }

    public function agregar_marca(Request $request) {
    
     //   $JsonMarcaYModelo = $request->all();

        $MarcaYModelo = new App\Autos();

        $MarcaYModelo->marca = $request->Marca;
        $MarcaYModelo->modelo = $request->Modelo;

        $MarcaYModelo->save();

        return response()->json($MarcaYModelo);
        
    }

    // Gastos
    public function agregar_gastos() {
        return view('administracion.gastos');
    }
}
