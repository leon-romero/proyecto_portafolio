<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBoletaServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleta_servicio', function (Blueprint $table) {
            $table->bigIncrements('id_boleta_servicio');
            $table->integer('id_ficha_cliente');
            $table->string('run_cliente');
            $table->string('nombre_cliente');
            $table->string('correo_cliente');
            $table->integer('id_odontologo');            
            $table->string('nombre_odontologo');
            $table->string('correo_odontologo');
            $table->date('fecha_servicio');
            $table->integer('id_horario');
            $table->string('horario');
            $table->integer('id_servicio');
            $table->string('nombre_servicio');
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
        Schema::dropIfExists('boleta_servicio');
    }
}
