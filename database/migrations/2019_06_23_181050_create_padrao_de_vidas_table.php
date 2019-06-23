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
            $table->unsignedInteger('idUser')->default(2);
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('moradia')->nullable();
            $table->string('servicos')->nullable();
            $table->string('transporte')->nullable();
            $table->string('saude')->nullable();
            $table->string('vestuario')->nullable();
            $table->string('seguroDeVidaPrevidencia')->nullable();
            $table->string('lazer')->nullable();
            $table->string('alimentacao')->nullable();
            $table->string('impostos')->nullable();
            $table->string('extrasoutros')->nullable();
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
