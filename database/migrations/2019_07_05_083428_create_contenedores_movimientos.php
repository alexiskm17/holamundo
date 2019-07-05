<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenedoresMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenedores_movimientos', function (Blueprint $table) {
            $table->bigIncrements('idcontenedormovimiento');
            $table->bigInteger('idcontenedor')->index('idcontenedor_contenedoresmovimientos')->unsigned();
            $table->bigInteger('idatc')->index('idatc_contenedoresmovimientos')->unsigned();
            $table->string('tipomovimiento', 5);
            $table->bigInteger('id_user_created')->unsigned();
            $table->timestamp('fecha_created')->useCurrent();
        });

        Schema::table('contenedores_movimientos', function(Blueprint $table){
            $table->foreign('idcontenedor')->references('idcontenedor')->on('contenedores')->onDelete('cascade');
            $table->foreign('idatc')->references('idatc')->on('atc')->onDelete('cascade');
            $table->foreign('id_user_created')->references('idusuario')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenedores_movimientos');
    }
}
