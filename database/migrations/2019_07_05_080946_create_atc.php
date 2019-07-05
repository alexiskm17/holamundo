<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atc', function (Blueprint $table) {
            $table->bigIncrements('idatc');
            $table->bigInteger('idempresa')->index('idempresa_atc')->unsigned();
            $table->integer('atc');
            $table->dateTime('fechaatc');
            $table->dateTime('fechavencimiento');
            $table->bigInteger('id_user_created')->unsigned();
            $table->timestamp('fecha_created')->useCurrent();
            $table->bigInteger('id_user_updated')->nullable()->unsigned();
            $table->timestamp('fecha_updated');

        });

        Schema::table('atc', function(Blueprint $table){
            $table->foreign('idempresa')->references('idempresa')->on('empresas')->onDelete('cascade');
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
        Schema::dropIfExists('atc');
    }
}
