<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulaInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formula_insumo', function (Blueprint $table) {
            $table->integer('id_formulas')->unsigned();
            $table->integer('id_insumo')->unsigned();
            $table->integer('cantidad');
            $table->integer('estado')->default(1);
            $table->primary(['id_formulas', 'id_insumo']);
            $table->foreign('id_formulas')->references('id_formulas')->on('formulas');
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
        Schema::dropIfExists('formula_insumo');
    }
}
