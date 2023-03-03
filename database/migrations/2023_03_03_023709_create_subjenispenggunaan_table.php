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
        Schema::create('subjenispenggunaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaSubJenisPenggunaan');

            $table->unsignedBigInteger('jenispenggunaan_id');
            $table->foreign('jenispenggunaan_id')->references('id')->on('jenispenggunaan');

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
        Schema::dropIfExists('subjenispenggunaan');
    }
};
