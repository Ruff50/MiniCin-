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
        Schema::create('salles', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 150);
            $table->integer('capacité');
            $table->timestamps();
        });
        Schema::table('films', function (Blueprint $table) {
            $table->unsignedBigInteger('salles_id');
         
            $table->foreign('salles_id')->references('id')->on('salles');
        });
    
    
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salles');
    }
};

