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
        Schema::create('adventures', function (Blueprint $table) {
            $table->id(); 
            $table->string('title');
            $table->string('description');
            $table->string('advice');
            $table->unsignedBigInteger('pictureID');
            $table->foreign('pictureID')->references('id')->on('pictures')->onDelete('cascade');
            $table->unsignedBigInteger('countryID');
            $table->foreign('countryID')->references('id')->on('country')->onDelete('cascade');
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
        Schema::dropIfExists('adventures');
    }
};
