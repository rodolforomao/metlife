<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDadoscadastraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dadoscadastrais', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idUser')->default(2);
            //$table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('nomecompleto')->nullable();
            $table->string('cpf')->nullable();
            $table->date('datanascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('estadocivil')->nullable();
            $table->string('enderecoresidencial')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dadoscadastrais');
    }
}
