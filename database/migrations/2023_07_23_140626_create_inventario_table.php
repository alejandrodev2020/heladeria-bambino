<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->increments('id_inventario');
            $table->timestamp('fecha');
            $table->integer('estado')->default(1);
            $table->integer('id_usuario');
            $table->integer('id_tipo_inventario');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_tipo_inventario')->references('id_tipo_inventario')->on('tipo_inventario');
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
        Schema::dropIfExists('inventario');
    }
}
