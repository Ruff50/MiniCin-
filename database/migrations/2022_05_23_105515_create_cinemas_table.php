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
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 150);
            $table->string('rue', 250);
            $table->string('cp', 5);
            $table->string('ville', 150);
            $table->string('tel', 18);
            $table->timestamps();
        });
        Schema::table('salles', function (Blueprint $table) {
            $table->unsignedBigInteger('cinema_id');
         
            $table->foreign('cinema_id')->references('salles_id')->on('cinemas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinemas');
    }
};

