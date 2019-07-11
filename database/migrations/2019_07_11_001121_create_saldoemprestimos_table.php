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
            $table->integer('idcliente')->nullable();
            $table->string('descoberto')->nullable();
            $table->string('maiorperiodo')->nullable();
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