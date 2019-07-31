<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idDadosFamiliares')->default(2);
            $table->foreign('idDadosFamiliares')->references('id')->on('dadosfamiliares')->onDelete('cascade');
            $table->unsignedInteger('idTipoEducacao')->default(2);
            $table->foreign('idTipoEducacao')->references('id')->on('tipoeducacaos')->onDelete('cascade');
            $table->float('custo',15,4)->nullable();
            $table->float('anos',15,4)->nullable();
            $table->float('total',15,4)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('educacaos');
    }
}
