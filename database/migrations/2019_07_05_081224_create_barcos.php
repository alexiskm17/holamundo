<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarcos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcos', function (Blueprint $table) {
            $table->bigIncrements('idbarco');
            $table->bigInteger('idempresa')->index('index_idempresa_barcos')->unsigned();
            $table->string('codigopuertolocal',5)->index('codigopuertolocal_listbarcos');
            $table->string('codigobarco', 5)->nullable();
            $table->string('nombrebarco', 50);
            $table->string('numviaje', 50);
            $table->integer('codigooperacion')->index('codigooperacion_listsbarcos');
            $table->bigInteger('id_user_created')->unsigned();
            $table->timestamp('fecha_created')->useCurrent();
            $table->bigInteger('id_user_updated')->nullable()->unsigned();
            $table->timestamp('fecha_updated');
        });

        Schema::table('barcos', function(Blueprint $table){
            $table->foreign('idempresa')->references('idempresa')->on('empresas')->onDelete('cascade');
            $table->foreign('codigopuertolocal')->references('codigopuertolocal')->on('puertos_locales');
            $table->foreign('id_user_created')->references('idusuario')->on('users');
            $table->foreign('id_user_updated')->references('idusuario')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barcos');
    }
}
