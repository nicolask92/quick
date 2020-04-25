<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('fecha_hora_traslado');
            $table->text('cliente')->nullable();
            $table->text('pasajero')->nullable();
            $table->text('equipaje')->nullable();
            $table->text('habitacion')->nullable();
            $table->text('tarifa')->nullable();
            $table->text('desde')->nullable();
            $table->text('hasta')->nullable();
            $table->text('solicito')->nullable();
            $table->text('vuelo')->nullable();
            $table->text('tipo_v')->nullable();
            $table->text('vehiculo')->nullable();
            $table->text('movil')->nullable();
            $table->text('comentarios')->nullable();
            $table->text('tipo_c')->nullable();
            $table->text('voucher')->nullable();
            $table->text('usuario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservars');
    }
}
