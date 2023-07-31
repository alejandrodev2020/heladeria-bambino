<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_activos', function (Blueprint $table) {
            $table->integer('id_inventario')->unsigned();
            $table->integer('id_activos')->unsigned();
            $table->integer('cantidad_inventario');
            $table->integer('cantidad_sistema');
            $table->primary(['id_inventario', 'id_activos']);
            $table->foreign('id_inventario')->references('id_inventario')->on('inventario');
            $table->foreign('id_activos')->references('id_activos')->on('activos');
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
        Schema::dropIfExists('inventario_activos');
    }
}
