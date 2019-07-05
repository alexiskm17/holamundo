<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuertosLocales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puertos_locales', function (Blueprint $table) {
            $table->bigIncrements('idpuertolocal');
            $table->string('codigopuertolocal',5)->index('codigopuertolocal_puertoslocales');
            $table->string('puerto', 65);
            $table->boolean('maritimo');
            $table->bigInteger('glnaduana')->nullable();
            $table->bigInteger('glnpuerto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puertos_locales');
    }
}
