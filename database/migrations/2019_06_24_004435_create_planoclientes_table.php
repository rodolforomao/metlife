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
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->unsignedInteger('idTipoFamiliar')->default(2);
            $table->foreign('idTipoFamiliare')->references('id')->on('tipofamiliars')->onDelete('cascade');
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
