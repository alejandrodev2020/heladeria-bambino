<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->increments('id_formulas');
            $table->string('nombre', 250);
            $table->string('descripcion', 250);
            $table->integer('cantidad_produccion')->default(0);
            $table->integer('cantidad_personal')->default(0);
            $table->float('duracion_horas');
            $table->integer('estado')->default(1);
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id_producto')->on('producto');
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
        Schema::dropIfExists('formulas');
    }
}
