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
            $table->unsignedInteger('idUser')->default(2);
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->string('idadeparaaposentadoria')->nullable();
            $table->string('segurodevida')->nullable();
            $table->string('capitalsegurado')->nullable();
            $table->string('premiomensal')->nullable();
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
