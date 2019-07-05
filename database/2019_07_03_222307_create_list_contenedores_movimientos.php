<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListContenedoresMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_contenedores_movimientos', function (Blueprint $table) {
            $table->bigIncrements('idcontenedormovimiento');
            $table->bigInteger('idcontenedor')->index('idcontenedor_listcontenedoresmovimientos')->unsigned();
            $table->bigInteger('idatc')->index('idatc_listcontenedoresmovimientos')->unsigned();
            $table->string('tipomovimiento', 5);
            $table->bigInteger('id_user_created')->unsigned();
            $table->timestamp('fecha_created')->useCurrent();
            
        });

        Schema::table('list_contenedores_movimientos', function(Blueprint $table){
            $table->foreign('idcontenedor')->references('idcontenedor')->on('list_contenedores')->onDelete('cascade');
            $table->foreign('idatc')->references('idatc')->on('list_atc')->onDelete('cascade');
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
        Schema::dropIfExists('list_contenedores_movimientos');
    }
}
