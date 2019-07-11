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
            $table->float('despezasgerais')->nullable();
            $table->float('moradia')->nullable();
            $table->float('servicos')->nullable();
            $table->float('transporte')->nullable();
            $table->float('saude')->nullable();
            $table->float('vestuario')->nullable();
            $table->float('seguroDeVidaPrevidencia')->nullable();
            $table->float('lazer')->nullable();
            $table->float('alimentacao')->nullable();
            $table->float('impostos')->nullable();
            $table->float('extrasoutros')->nullable();
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
