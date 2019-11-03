<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('predA1') -> nullable();
            $table->integer('predA2') -> nullable();

            $table->integer('predB1') -> nullable();
            $table->integer('predB2') -> nullable();

            $table->integer('predC1') -> nullable();
            $table->integer('predC2') -> nullable();

            $table->integer('predD1') -> nullable();
            $table->integer('predD2') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kkms');
    }
}
