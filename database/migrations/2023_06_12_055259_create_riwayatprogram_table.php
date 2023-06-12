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
        Schema::create('riwayatprogram', function (Blueprint $table) {

            $table->id('riwayatprogram_id');
            $table->longText('review');

            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('program_id')->on('program')->onDelete('cascade');

            $table->unsignedBigInteger('controller');
            $table->foreign('controller')->references('jabatan_id')->on('pejabat')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('riwayatprogram');
    }
};
