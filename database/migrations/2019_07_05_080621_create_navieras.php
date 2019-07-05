<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavieras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navieras', function (Blueprint $table) {
            $table->bigIncrements('idnaviera');
            $table->bigInteger('idempresa')->unsigned();
            $table->string('naviera',70);
            $table->bigInteger('id_user_created')->unsigned();
            $table->timestamp('fecha_created')->useCurrent();
            $table->bigInteger('id_user_updated')->nullable()->unsigned();
            $table->timestamp('fecha_updated');
        });

        Schema::table('navieras', function( Blueprint $table){
            $table->foreign('idempresa')->references('idempresa')->on('users');
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
        Schema::dropIfExists('navieras');
    }
}
