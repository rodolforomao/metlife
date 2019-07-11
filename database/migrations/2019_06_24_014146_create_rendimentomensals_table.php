<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRendimentomensalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendimentomensals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('idCliente')->default(2);
            $table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('tipoFamiliar')->nullable();
            $table->float('remendimentosmensal')->nullable();
            $table->float('outrasrendas')->nullable();
            $table->integer('declaracaodeir')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rendimentomensals');
    }
}
