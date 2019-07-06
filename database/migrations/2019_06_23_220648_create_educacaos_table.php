<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('idadeserie')->nullable();
            $table->string('totaldeanosparaformacao')->nullable();
            $table->string('basico')->nullable();
            $table->string('custo2')->nullable();
            $table->string('anos2')->nullable();
            $table->string('total2')->nullable();
            $table->string('fundamental3anos')->nullable();
            $table->string('filho')->nullable();
            $table->string('custo3')->nullable();
            $table->string('anos3')->nullable();
            $table->string('total3')->nullable();
            $table->string('superior4a5anos')->nullable();
            $table->string('custo4')->nullable();
            $table->string('anos4')->nullable();
            $table->string('total4')->nullable();
            $table->string('infantil')->nullable();
            $table->string('custo1')->nullable();
            $table->string('anos1')->nullable();
            $table->string('total1')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('educacaos');
    }
}
