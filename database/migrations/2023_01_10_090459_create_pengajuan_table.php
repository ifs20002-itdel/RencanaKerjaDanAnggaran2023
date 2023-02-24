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
            $table->string('jenis');
            $table->string('rincianProgram');
            $table->integer('volume');
            $table->string('satuan');
            $table->integer('hargaSatuan');
            $table->string('total');
            $table->string('start');
            $table->string('finish');
            $table->string('pemohon');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('penggunaan_id');
            $table->foreign('penggunaan_id')->references('id')->on('penggunaan')->onDelete('cascade');

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
