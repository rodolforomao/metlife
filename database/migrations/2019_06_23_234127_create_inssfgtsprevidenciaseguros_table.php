<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInssfgtsprevidenciasegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inssfgtsprevidenciaseguros', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idDadosFamiliares')->default(2);
            $table->foreign('idDadosFamiliares')->references('id')->on('dadosfamiliares')->onDelete('cascade');
            $table->float('fgts',15,4)->nullable();
            $table->float('inss',15,4)->nullable();
            $table->integer('idadeaposentadoria')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inssfgtsprevidenciaseguros');
    }
}
