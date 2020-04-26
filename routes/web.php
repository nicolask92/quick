<?php

use Illuminate\Support\Facades\Route;

/* Admin Dash  */

    Route::get('/dash','DashController@index')->name('dash');     //Area administrativa general
        Route::get('/agregar_usuarios','DashController@agregaruser')->name('agregaruser');
        Route::post('/agregar_usuarios','DashController@agregando')->name('agregado');

        Route::get('/roles','RolController@index')->name('roles');


// Generales 

        Route::get('/','InicioController@index')->name('index');
        Route::get('/buscado','InicioController@indexbusqueda')->name('indexbusqueda');

// Agregar Reservas

        Route::get('/reservar_nuevo','ReservarController@reserve')->name('reservar.agregar');
        Route::post('/reserva_agregada','ReservarController@reservado')->name('reservar.agregado');



// Administrativo
    //Clientes
        Route::get('/administracion/clientes','AdministracionController@agregar_cliente')->name('administracion.clientes');
        Route::post('/administracion/cliente_agregado','AdministracionController@agregado_cliente')->name('administracion.clientes_a');

    //Tarifas
        Route::get('/administracion/tarifas','AdministracionController@agregar_tarifas')->name('administracion.tarifas');
        Route::post('/administracion/tarifas','AdministracionController@agregado_tarifa')->name('administracion.tarifas_a');

    //Moviles
        Route::get('/administracion/moviles','AdministracionController@agregar_moviles')->name('administracion.moviles');
        Route::post('/administracion/moviles','AdministracionController@agregado_moviles')->name('administracion.moviles_a');
            Route::post('/administracion/agregar_marca','AdministracionController@agregar_marca')->name('administracion.addmarca');

    //Gastos
        Route::get('/administracion/gastos','AdministracionController@agregar_gastos')->name('administracion.gastos');
        Route::post('/administracion/gastos','AdministracionController@agregado_gastos')->name('administracion.gastos_a');


// Auth

Auth::routes(); 