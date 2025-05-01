<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganMasjidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_masjids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_keuangan_id')->unsigned();
            $table->date('tanggal');
            $table->string('keterangan');
            $table->enum('jenis', ['Masuk', 'Keluar']);
            $table->string('nominal');
            $table->timestamps();
            $table->foreign('kategori_keuangan_id')->references('id')->on('kategori_keuangans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keuangan_masjids');
    }
}
