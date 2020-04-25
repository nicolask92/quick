<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('movil');
            $table->text('celular');
            $table->text('marca');
            $table->text('modelo');
            $table->text('relacion');
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
        Schema::dropIfExists('movils');
    }
}
