<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFichaProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_proveedor', function (Blueprint $table) {
            $table->bigIncrements('id_ficha_proveedor');
            $table->string('username', 60)->unique();;
            $table->string('password', 64);
            $table->string('nombre_empresa', 100);
            $table->text('rubro');
            $table->string('telefono', 60)->nullable();
            $table->string('correo', 100)->unique();
            $table->integer('bloqueo');
            $table->integer('activo');
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
        Schema::dropIfExists('ficha_proveedor');
    }
}
