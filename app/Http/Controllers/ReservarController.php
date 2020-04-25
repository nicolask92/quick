<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Carbon\Carbon;

class ReservarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reserve() {

        $todos_clientes = App\Clientes::all();
        $moviles = App\Movil::all();

        return view('reservar.agregar',compact('todos_clientes','moviles'));
    }
    public function reservado(Request $request){

        if($request->fecha_c==null || $request->fecha_c == '')
        {
            return back()->with('mensaje', 'Ingrese fecha');
        }
        
        else{
            //Validacion Hora
                    $hora = $request->hora;
                    $minutos = $request->minutos;
                    
                    if(($hora >= 0 || $hora<=24 )&&($minutos >= 0 || $minutos<=60 )) {
                        
                        $hora_completa = date('H:i', strtotime("$hora:$minutos"));

                        $nueva_reserva = new App\Reservar;

                        $date = date_create($request->fecha_c);
                        $date = Carbon::parse($date)->format('Y-m-d');

                        $date = "$date $hora_completa";
            
                        $nueva_reserva->fecha_hora_traslado = $date;
                    }
                    else {
                        return back()->with('mensaje', 'Formato de Hora mal ingresada');
                    }
        }
        
        if($request->cliente== null || $request->cliente== ''){
            return back()->with('mensaje', 'Ingrese Cliente');
        }
        else {
            $nueva_reserva->cliente = $request->cliente;
        }


        if($request->pasajero==''){
            $nueva_reserva->pasajero = "S/D";
        }
        else {
            $nueva_reserva->pasajero = $request->pasajero;
        }
      
        if($request->desde==''){
            $nueva_reserva->desde = "S/D";
        }
        else {
            $nueva_reserva->desde = $request->desde;
        }

        if($request->hasta==''){
            $nueva_reserva->hasta = "S/D";
        }
        else {
            $nueva_reserva->hasta = $request->hasta;
        }

        if($request->equipaje==''){
            $nueva_reserva->equipaje = "S/D";
        }
        else {
            $nueva_reserva->equipaje = $request->equipaje;
        }

        if($request->habitacion==''){
            $nueva_reserva->habitacion = "S/D";
        }
        else {
            $nueva_reserva->habitacion = $request->habitacion;
        }

        if($request->vuelo==''){
            $nueva_reserva->vuelo = "S/D";
        }
        else {
            $nueva_reserva->vuelo = $request->vuelo;
        }

        if($request->tarifa==''){
            $nueva_reserva->tarifa = "S/D";
        }
        else {
            $nueva_reserva->tarifa = $request->tarifa;
        }
        
        if($request->movil==''){
            $nueva_reserva->movil = "S/D";
        }
        else {
            $nueva_reserva->movil = $request->movil;
        }

        if($request->solicito==''){
            $nueva_reserva->solicito = "S/D";
        }
        else {
            $nueva_reserva->solicito = $request->solicito;
        }

        if($request->tipo_v=='' ? $nueva_reserva->tipo_v = "S/D" : $nueva_reserva->tipo_v = $request->tipo_v;);

        if($request->vehiculo == '' ?  $nueva_reserva->vehiculo ="S/D" : $nueva_reserva->vehiculo = $request->vehiculo );

        if($request->comentarios == '' ?  $nueva_reserva->comentarios ="S/D" : $nueva_reserva->comentarios = $request->comentarios );
        
        if($request->tipo_c == '' ?  $nueva_reserva->tipo_c ="S/D" : $nueva_reserva->tipo_c = $request->tipo_c );
        
        if($request->voucher == '' ?  $nueva_reserva->voucher ="S/D" : $nueva_reserva->voucher = $request->voucher );
        
        if($request->usuario == '' ?  $nueva_reserva->usuario ="S/D" : $nueva_reserva->usuario = "Super Admin" );


        


        $nueva_reserva->save();



        return back()->with('mensaje_success', 'Traslado agregado');

    }
}
