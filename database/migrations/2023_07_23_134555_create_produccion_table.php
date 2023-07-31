<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccion', function (Blueprint $table) {
            $table->increments('id_produccion');
            $table->timestamp('hora_inicio');
            $table->timestamp('hora_fin');
            $table->integer('lote');
            $table->integer('estado')->default(1);
            $table->integer('id_formulas')->unsigned();
            $table->integer('id_cronograma_diario')->unsigned();
            $table->foreign('id_formulas')->references('id_formulas')->on('formulas');
            $table->foreign('id_cronograma_diario')->references('id_cronograma_diario')->on('cronograma_diario');
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
        Schema::dropIfExists('produccion');
    }
}
