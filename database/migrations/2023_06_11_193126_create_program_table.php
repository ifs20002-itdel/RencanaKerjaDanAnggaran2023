<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->id('program_id');
            //Tahun
            $table->unsignedBigInteger('tahun_id');
            $table->foreign('tahun_id')->references('tahun_id')->on('tahun')->onDelete('cascade');
            //MataAnggaran
            $table->unsignedBigInteger('mataanggaran_id');
            $table->foreign('mataanggaran_id')->references('id')->on('mataanggaran')->onDelete('cascade');

            $table->string('namaProgram');
            $table->longText('tujuan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->longText('waktu');

            //Satuan
            $table->unsignedBigInteger('satuan_id');
            $table->foreign('satuan_id')->references('satuan_id')->on('satuan')->onDelete('cascade');

            $table->integer('volume');
            $table->longText('hargaSatuan');
            $table->longText('hargaTotal');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('unit_id')->on('unit')->onDelete('cascade');

            $table->unsignedBigInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('jabatan_id')->on('pejabat')->onDelete('cascade');

            $table->string('status');
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
        Schema::dropIfExists('program');
    }
};

