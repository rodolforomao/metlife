<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerfilusuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfilusuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idUsuario')->default(2);
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('idPerfil')->default(2);
            $table->foreign('idPerfil')->references('id')->on('perfis')->onDelete('cascade');
            $table->boolean('usuariopermitido')->default(false);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perfilusuarios');
    }
}
