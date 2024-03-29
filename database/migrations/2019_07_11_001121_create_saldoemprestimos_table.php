<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaldoemprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldoemprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->float('descoberto',15,4)->nullable();
            $table->float('maiorperiodo',15,4)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('saldoemprestimos');
    }
}
