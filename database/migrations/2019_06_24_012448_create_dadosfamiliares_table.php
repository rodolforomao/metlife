<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDadosfamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dadosfamiliares', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idCliente')->nullable();
            //$table->unsignedInteger('idCliente')->default(2);
            //$table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('tipoFamiliar')->nullable();
            $table->string('nome')->nullable();
            $table->date('datanascimento')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dadosfamiliares');
    }
}
