<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatrimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idCliente')->nullable();
            //$table->unsignedInteger('idCliente')->default(2);
            //$table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->float('fundos')->nullable();
            $table->float('reservas')->nullable();
            $table->float('inventario')->nullable();
            $table->float('emergencia')->nullable();
            $table->float('funeral')->nullable();
            $table->float('outros')->nullable();
            $table->float('imoveis')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patrimonios');
    }
}
