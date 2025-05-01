<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrayerTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prayer_times', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->time('subuh')->default('00:00');
            $table->time('syuruq')->default('00:00');
            $table->time('dzhuhur')->default('00:00');
            $table->time('asar')->default('00:00');
            $table->time('maghrib')->default('00:00');
            $table->time('isya')->default('00:00');
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
        Schema::dropIfExists('prayer_times');
    }
}
