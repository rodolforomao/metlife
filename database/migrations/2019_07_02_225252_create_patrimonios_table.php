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
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('fundos')->nullable();
            $table->string('reservas')->nullable();
            $table->string('inventario')->nullable();
            $table->string('emergencia')->nullable();
            $table->string('funeral')->nullable();
            $table->string('outros')->nullable();
            $table->string('total')->nullable();
            $table->string('imoveis')->nullable();
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
