<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmprestimounitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimounitarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idcliente')->nullable();
            $table->float('saldodevedor')->nullable();
            $table->float('possuiseguro')->nullable();
            $table->float('parcelamensal')->nullable();
            $table->float('prazoresidual')->nullable();
            $table->float('saldodevedordescoberto')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emprestimounitarios');
    }
}
