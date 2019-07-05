<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('idempresa');
            $table->string('empresa', 70);
            $table->string('codigoubicacion', 2)->index('index_codigoubicacion_empresas');
            $table->timestamp('fecha_created')->useCurrent();
            $table->bigInteger('id_user_updated')->nullable()->unsigned();
            $table->timestamp('fecha_updated');
        });

        Schema::table('empresas', function(Blueprint $table){
            $table->foreign('codigoubicacion')->references('codigoubicacion')->on('ubicaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
