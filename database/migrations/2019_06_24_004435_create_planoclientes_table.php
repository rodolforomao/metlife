<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanoclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planoclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idUser')->default(2);
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('nome')->nullable();
            $table->string('risco')->nullable();
            $table->string('cpf')->nullable();
            $table->string('sexo')->nullable();
            $table->date('nascimento')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planoclientes');
    }
}
