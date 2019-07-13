<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInssprevidenciaclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inssprevidenciaclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idCliente')->nullable();
            //$table->unsignedInteger('idCliente')->default(2);
            //$table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('tipoFamiliar')->nullable();
            $table->float('previdencia')->nullable();
            $table->float('pgblvgbl')->nullable();
            $table->float('saldoacumulado')->nullable();
            $table->float('contribuicaoanual')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inssprevidenciaclientes');
    }
}
