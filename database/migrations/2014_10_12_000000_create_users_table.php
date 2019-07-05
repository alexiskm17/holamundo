<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('idusuario');
            $table->string('usuario', 65)->unique();
            $table->bigInteger('idempresa')->index('idempresa_users')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('fecha_created')->useCurrent();
            $table->bigInteger('id_user_updated')->unsigned()->nullable();
            $table->timestamp('fecha_updated');
            $table->bigInteger('id_user_deleted')->unsigned()->nullable();
            $table->timestamp('fecha_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
