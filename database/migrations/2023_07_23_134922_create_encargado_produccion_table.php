<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncargadoProduccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargado_produccion', function (Blueprint $table) {
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_produccion')->unsigned();
            $table->primary(['id_usuario', 'id_produccion']);
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_produccion')->references('id_produccion')->on('produccion');
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
        Schema::dropIfExists('encargado_produccion');
    }
}
