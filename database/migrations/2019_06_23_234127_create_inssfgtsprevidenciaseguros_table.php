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
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('tipoFamiliar')->nullable();
            $table->float('fgts')->nullable();
            $table->float('inss')->nullable();
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
