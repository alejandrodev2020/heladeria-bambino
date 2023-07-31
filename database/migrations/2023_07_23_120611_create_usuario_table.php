<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre', 250);
            $table->string('apellido', 250);
            $table->string('ci', 250);
            $table->string('email', 250);
            $table->string('pasword', 250);
            $table->integer('estado')->default(1);
            $table->integer('id_rol')->nullable();
            $table->foreign('id_rol')->references('id_rol')->on('rol');
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
        Schema::dropIfExists('usuario');
    }
}
