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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('jabatan');
            $table->string('namaProgram');
            $table->longText('tujuan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->longText('waktu');
            $table->integer('volume');
            $table->string('satuan');
            $table->integer('hargaSatuan');
            $table->integer('hargaTotal');
            $table->integer('user_id');
            
            $table->unsignedBigInteger('mataanggaran_id');
            $table->foreign('mataanggaran_id')->references('id')->on('mataanggaran')->onDelete('cascade');


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
        Schema::dropIfExists('pengajuan');
    }
};