<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costos', function (Blueprint $table) {
            $table->increments('id_costos');
            $table->float('costos_operativos',10,2);
            $table->float('costos_brutos',10,2);
            $table->timestamp('fecha');
            $table->integer('estado')->default(1);
            $table->integer('id_producto');
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
        Schema::dropIfExists('costos');
    }
}
