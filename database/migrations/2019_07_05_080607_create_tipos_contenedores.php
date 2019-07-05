<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposContenedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_contenedores', function (Blueprint $table) {
            $table->bigIncrements('idtipocontenedor');
            $table->string('tipocontenedor', 4)->index('iindex_tipocontenedor_tiposcontenedores');
            $table->string('tipo', 75);
            $table->boolean('mostrar')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_contenedores');
    }
}
