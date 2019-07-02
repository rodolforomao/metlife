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
            $table->unsignedInteger('idUser')->default(2);
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('previdencia')->nullable();
            $table->string('pgblvgbl')->nullable();
            $table->string('saldoacumulado')->nullable();
            $table->string('contribuicaoanual')->nullable();
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