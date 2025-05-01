<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasJumatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas_jumats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('imam')->nullable();
            $table->string('khotib')->nullable();
            $table->string('muazin')->nullable();
            $table->string('judul')->nullable();
            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas_jumats');
    }
}
