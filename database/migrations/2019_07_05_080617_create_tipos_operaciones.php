<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiposOperaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_operaciones', function (Blueprint $table) {
            $table->bigIncrements('idtipooperacion');
            $table->integer('codigooperacion')->index('index_codigooperacion_tiposoperaciones');
            $table->string('descripcion', 55);
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
        Schema::dropIfExists('tipos_operaciones');
    }
}
