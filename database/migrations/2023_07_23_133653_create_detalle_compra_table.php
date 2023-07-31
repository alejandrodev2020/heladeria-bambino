<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->integer('id_insumo')->unsigned();
            $table->integer('id_compra')->unsigned();
            $table->float('cantidad',10,2);
            $table->float('precio',10,2);
            $table->primary(['id_insumo', 'id_compra']);
            $table->foreign('id_insumo')->references('id_insumo')->on('insumo');
            $table->foreign('id_compra')->references('id_compra')->on('compra');
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
        Schema::dropIfExists('detalle_compra');
    }
}
