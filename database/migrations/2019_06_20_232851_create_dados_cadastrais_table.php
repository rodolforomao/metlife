<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosCadastraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_cadastrais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->number('cpf');
            $table->number('data_nasc');
            $table->string('sexo');
            $table->string('estado_civil');
            $table->string('endereco');
            $table->string('email');
            $table->string('celular');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_cadastrais');
    }
}
