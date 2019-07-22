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
            $table->float('outros',15,4)->nullable();
            $table->float('imoveis',15,4)->nullable();
            $table->float('fundos',15,4)->nullable();
            $table->float('reservas',15,4)->nullable();
            $table->float('inventario',15,4)->nullable();
            $table->float('emergencia',15,4)->nullable();
            $table->float('funeral',15,4)->nullable()->default(10000);
            
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
