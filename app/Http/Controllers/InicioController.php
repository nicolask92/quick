<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DateTime;
use Carbon\Carbon;

class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        

        $reservas = App\Reservar::whereDate('fecha_hora_traslado', '=', Carbon::now()->format('Y-m-d'))->get();
        return view('home', compact('reservas'));

    }
    public function indexbusqueda(Request $request) {
        
        $fecha_c = $request->fecha_c;
        $fecha_f = $request->fecha_f;

        $ini = date('Y-m-d 00:00:00',strtotime($fecha_c));
        $fin = date('Y-m-d 23:59:59',strtotime($fecha_f));

        $reservas = App\Reservar::whereBetween('fecha_hora_traslado', [$ini, $fin])->get();

        return view('home', compact('reservas'));
    }
}
