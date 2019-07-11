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
            $table->string('apelidofilho')->nullable();
            $table->string('idadeserie')->nullable();
            $table->float('totaldeanosparaformacao')->nullable();
            $table->string('basico')->nullable();
            $table->float('custo2')->nullable();
            $table->float('anos2')->nullable();
            $table->float('total2')->nullable();
            $table->string('fundamental3anos')->nullable();
            $table->float('custo3')->nullable();
            $table->float('anos3')->nullable();
            $table->float('total3')->nullable();
            $table->string('superior4a5anos')->nullable();
            $table->float('custo4')->nullable();
            $table->float('anos4')->nullable();
            $table->float('total4')->nullable();
            $table->string('infantil')->nullable();
            $table->float('custo1')->nullable();
            $table->float('anos1')->nullable();
            $table->float('total1')->nullable();
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
