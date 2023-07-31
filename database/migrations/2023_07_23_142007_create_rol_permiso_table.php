<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolPermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_permiso', function (Blueprint $table) {
            $table->integer('id_rol')->unsigned();
            $table->integer('id_permisos')->unsigned();
            $table->primary(['id_rol', 'id_permisos']);
            $table->foreign('id_rol')->references('id_rol')->on('rol');
            $table->foreign('id_permisos')->references('id_permisos')->on('permisos');
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
        Schema::dropIfExists('rol_permiso');
    }
}
