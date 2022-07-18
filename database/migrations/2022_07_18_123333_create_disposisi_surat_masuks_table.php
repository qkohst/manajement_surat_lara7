<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi_surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->unsigned();
            $table->unsignedBigInteger('surat_masuks_id')->unsigned();
            $table->string('tujuan', 100);
            $table->string('isi');
            $table->string('sifat', 100);
            $table->date('batas_waktu');
            $table->string('catatan');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('surat_masuks_id')->references('id')->on('surat_masuks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisi_surat_masuks');
    }
}
