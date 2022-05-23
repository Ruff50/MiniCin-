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
        Schema::create('réalisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 150);
            $table->string('prenom', 150);
            $table->string('nationalite', 150);
            $table->date('age');
            $table-> boolean('sexe');   
            $table->timestamps();
        });
        Schema::table('films', function (Blueprint $table) {
            $table->unsignedBigInteger('realisateurs_id');
         
            $table->foreign('realisateurs_id')->references('id')->on('réalisateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('réalisateurs');
    }
};
