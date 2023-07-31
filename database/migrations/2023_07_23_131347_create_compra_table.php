<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('id_compra');
            $table->timestamp('fecha');
            $table->float('monto_total',10,2);
            $table->string('referencia', 250);
            $table->integer('estado')->default(1);
            $table->integer('id_usuario');
            $table->integer('id_proveedor');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedor');
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
        Schema::dropIfExists('compra');
    }
}
