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
            $table->integer('tahun');
            $table->string('namaProgram');
            $table->longText('tujuan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->longText('waktu');
            $table->integer('volume');
            $table->integer('hargaSatuan');
            $table->integer('hargaTotal');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('unit_id')->on('unit')->onDelete('cascade');
            
            $table->unsignedBigInteger('mataanggaran_id');
            $table->foreign('mataanggaran_id')->references('id')->on('mataanggaran')->onDelete('cascade');

            $table->unsignedBigInteger('satuan_id');
            $table->foreign('satuan_id')->references('satuan_id')->on('satuan')->onDelete('cascade');

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
