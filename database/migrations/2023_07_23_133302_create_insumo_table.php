<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumo', function (Blueprint $table) {
            $table->increments('id_insumo');
            $table->integer('cantidad');
            $table->string('nombre',250);
            $table->string('codigo',250);
            $table->string('medida',250);
            $table->float('precio',10,2);
            $table->integer('estado')->default(1);
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_almacen')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria');
            $table->foreign('id_almacen')->references('id_almacen')->on('almacen');
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
        Schema::dropIfExists('insumo');
    }
}
