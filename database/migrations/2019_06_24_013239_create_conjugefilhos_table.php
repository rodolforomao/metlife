<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConjugefilhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjugefilhos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idUser')->nullable();
            $table->integer('idconjuge')->nullable();
            $table->string('filho')->nullable();
            $table->date('datanascimento')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conjugefilhos');
    }
}
