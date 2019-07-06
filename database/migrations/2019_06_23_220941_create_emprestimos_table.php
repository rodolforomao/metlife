<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('maiorperiodoparaemprestimofinananos')->nullable();
            $table->string('emprestimos')->nullable();
            $table->string('valor3')->nullable();
            $table->string('descobertoemprestimofinanciamento')->nullable();
            $table->string('valor1')->nullable();
            $table->string('n1')->nullable();
            $table->string('valor2')->nullable();
            $table->string('n2')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emprestimos');
    }
}
