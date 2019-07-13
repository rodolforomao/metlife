<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInssseguroclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inssseguroclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idCliente')->nullable();
            //$table->unsignedInteger('idCliente')->default(2);
            //$table->foreign('idCliente')->references('id')->on('dadoscadastrais')->onDelete('cascade');
            $table->string('tipoFamiliar')->nullable();
            $table->float('segurodevida')->nullable();
            $table->float('capitalsegurado')->nullable();
            $table->float('premiomensal')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inssseguroclientes');
    }
}
