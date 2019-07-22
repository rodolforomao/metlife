<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanovaloresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planovalores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->unsignedInteger('idTipoFamiliar')->default(2);
            $table->foreign('idTipoFamiliar')->references('id')->on('tipofamiliars')->onDelete('cascade');
            $table->unsignedInteger('idPlanoProduto')->default(2);
            $table->foreign('idPlanoProduto')->references('id')->on('planoprodutodescs')->onDelete('cascade');
            $table->date('vigencia')->nullable();
            $table->integer('prazo')->nullable();
            $table->boolean('capitalsegurado')->nullable();
            $table->float('valor',15,4)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planovalores');
    }
}
