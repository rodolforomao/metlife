<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanoprodutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planoprodutos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idUser')->nullable();
            $table->string('idproduto')->nullable();
            $table->string('vigencia')->nullable();
            $table->string('prazo')->nullable();
            $table->string('capital')->nullable();
            $table->date('segurado')->nullable();
            $table->string('valor')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planoprodutos');
    }
}
