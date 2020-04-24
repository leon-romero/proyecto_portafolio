<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaFichaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_cliente', function (Blueprint $table) {
            $table->bigIncrements('id_ficha_cliente');
            $table->string('username', 60)->unique();
            $table->string('password', 64);
            $table->string('run', 15)->unique();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 60)->nullable();
            $table->string('correo', 100)->unique();
            $table->integer('id_comuna');
            $table->text('direccion');
            $table->integer('bloqueo');
            $table->integer('activo');
            $table->timestamps(); //debe estar al final de tadas las $table si o si
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_cliente');
    }
}
