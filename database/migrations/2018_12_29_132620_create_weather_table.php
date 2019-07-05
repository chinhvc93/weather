<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('temperature');
            $table->integer('humidity');
            $table->double('ph', 8, 2);
            $table->integer('soil_moisture');
            $table->integer('pir');
            $table->integer('ec_meter');
            $table->integer('light');
            $table->integer('pin');
            $table->dateTime('date');
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
        Schema::dropIfExists('weather');
    }
}
