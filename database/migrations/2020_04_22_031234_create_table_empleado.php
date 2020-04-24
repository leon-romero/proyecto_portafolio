<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->bigIncrements('id_empleado');
            $table->string('username', 60)->unique();;
            $table->string('password', 64);
            $table->string('run', 15);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 60)->nullable();
            $table->string('correo', 100)->unique();
            $table->integer('id_tipo_empleado');
            $table->integer('bloqueado');
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
        Schema::dropIfExists('empleado');
    }
}
