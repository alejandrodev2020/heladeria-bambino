<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_insumo', function (Blueprint $table) {
            $table->integer('id_inventario')->unsigned();
            $table->integer('id_insumo')->unsigned();
            $table->float('cantidad_inventario');
            $table->float('cantidad_sistema');
            $table->primary(['id_inventario', 'id_insumo']);
            $table->foreign('id_inventario')->references('id_inventario')->on('inventario');
            $table->foreign('id_insumo')->references('id_insumo')->on('insumo');
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
        Schema::dropIfExists('inventario_insumo');
    }
}
