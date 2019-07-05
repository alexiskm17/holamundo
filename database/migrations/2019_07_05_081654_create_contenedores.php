<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenedores', function (Blueprint $table) {
            $table->bigIncrements('idcontenedor');
            $table->bigInteger('idempresa')->index('index_idempresa_contenedores')->unsigned();
            $table->bigInteger('idbarco')->index('index_idbarco_contenedores')->unsigned();
            $table->bigInteger('idatc')->index('index_idatc_contenedores')->unsigned();
            $table->integer('codigooperacion')->index('index_codigooperacion_contenedores');
            $table->string('contenedor', 12);
            $table->string('tipocontenedor', 4)->index('index_tipocontenedor_contenedores');
            $table->bigInteger('idestadocontenedor')->index('index_idestadocontenedor_contenedores')->unsigned();
            $table->string('usuariocrea', 65);
            $table->dateTime('fechacrea');
            $table->string('usuariomodifica', 65);
            $table->dateTime('fechamodifica');
            $table->bigInteger('id_user_created')->unsigned();
            $table->timestamp('fecha_created')->useCurrent();
            $table->bigInteger('id_user_updated')->unsigned()->nullable();
            $table->bigInteger('fecha_updated');
        });

        Schema::table('contenedores', function(Blueprint $table){
            $table->foreign('idempresa')->references('idempresa')->on('empresas');
            $table->foreign('idbarco')->references('idbarco')->on('barcos');
            $table->foreign('idatc')->references('idatc')->on('atc');
            $table->foreign('codigooperacion')->references('codigooperacion')->on('tipos_operaciones');
            $table->foreign('tipocontenedor')->references('tipocontenedor')->on('tipos_contenedores');
            $table->foreign('idestadocontenedor')->references('idestadocontenedor')->on('estados_contenedores');
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
        Schema::dropIfExists('contenedores');
    }
}
