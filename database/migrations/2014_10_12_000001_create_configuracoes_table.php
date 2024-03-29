<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idUser')->default(2);
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->double('idadeFinalSituacaoAtual');
            $table->double('valorSonho');
            $table->double('valorFuneral');
            $table->double('valorEmergencial');
            $table->double('valorInventario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracoes');
    }
}
