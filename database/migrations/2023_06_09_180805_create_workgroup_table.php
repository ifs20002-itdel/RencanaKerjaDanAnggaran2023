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
        Schema::create('workgroup', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('unit');
            //Controller
            $table->unsignedBigInteger('controller');
            $table->foreign('controller')->references('jabatan_id')->on('pejabat')->onDelete('cascade');
            
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
        Schema::dropIfExists('workgroup');
    }
};
