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
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->unsignedInteger('idTipoFamiliar')->default(2);
            $table->foreign('idTipoFamiliar')->references('id')->on('tipofamiliars')->onDelete('cascade');
            $table->float('previdencia',15,4)->nullable();
            $table->float('pgblvgbl',15,4)->nullable();
            $table->float('saldoacumulado',15,4)->nullable();
            $table->float('contribuicaoanual',15,4)->nullable();
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
