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
        Schema::create('mataanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('mataAnggaran');
            $table->string('namaAnggaran');
            //Workgroup
            $table->longText('workgroup_id');
            //JenisPenggunaan
            $table->unsignedBigInteger('jenispenggunaan_id');
            $table->foreign('jenispenggunaan_id')->references('id')->on('jenispenggunaan')->onDelete('cascade');
            //SubJenisPenggunaan
            $table->unsignedBigInteger('subjenispenggunaan_id')->nullable();
            $table->foreign('subjenispenggunaan_id')->references('id')->on('subjenispenggunaan')->onDelete('cascade');
            
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
        Schema::dropIfExists('mataanggaran');
    }
};
