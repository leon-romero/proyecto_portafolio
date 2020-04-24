<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->string('nombre_producto', 100);
            $table->text('descripcion');
            $table->integer('id_familia');
            $table->integer('id_tipo_producto');
            $table->integer('stock');
            $table->integer('stock_critico');
            $table->integer('precio_compra')->nullable();
            $table->integer('precio_venta')->nullable();
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
        Schema::dropIfExists('producto');
    }
}
