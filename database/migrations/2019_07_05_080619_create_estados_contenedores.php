<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosContenedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_contenedores', function (Blueprint $table) {
            $table->bigIncrements('idestadocontenedor');
            $table->string('estado', 10);
            $table->boolean('codigoestado')->index('index_codigoestado_etadoscontenedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados_contenedores');
    }
}
