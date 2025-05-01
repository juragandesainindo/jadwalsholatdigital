<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIqomahTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iqomah_times', function (Blueprint $table) {
            $table->id();
            $table->string('sholat')->unique(); // Nama sholat (fajr, dhuhr, asr, maghrib, isha)
            $table->integer('duration')->default(10); // Durasi iqomah dalam detik
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
        Schema::dropIfExists('iqomah_times');
    }
}
