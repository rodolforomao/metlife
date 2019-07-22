<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePadraoDeVidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padrao_de_vidas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->float('despezasgerais',15,4)->nullable();
            $table->float('moradia',15,4)->nullable();
            $table->float('servicos',15,4)->nullable();
            $table->float('transporte',15,4)->nullable();
            $table->float('saude',15,4)->nullable();
            $table->float('vestuario',15,4)->nullable();
            $table->float('seguroDeVidaPrevidencia',15,4)->nullable();
            $table->float('lazer',15,4)->nullable();
            $table->float('alimentacao',15,4)->nullable();
            $table->float('impostos',15,4)->nullable();
            $table->float('extrasoutros',15,4)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('padrao_de_vidas');
    }
}
