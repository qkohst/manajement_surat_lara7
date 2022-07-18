<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->unsigned();
            $table->unsignedBigInteger('klasifikasis_id')->unsigned();
            $table->string('nomor_surat', 100);
            $table->string('tujuan_surat', 100);
            $table->string('isi_surat');
            $table->date('tanggal_surat');
            $table->string('file');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('klasifikasis_id')->references('id')->on('klasifikasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluars');
    }
}
