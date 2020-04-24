<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdenEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_empleado', function (Blueprint $table) {
            $table->bigIncrements('id_orden_empleado');
            $table->string('codigo');
            $table->integer('id_empleado');
            $table->integer('id_empleado_r')->nullable();
            $table->integer('id_ficha_proveedor');
            $table->integer('enviado');
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
        Schema::dropIfExists('orden_empleado');
    }
}
