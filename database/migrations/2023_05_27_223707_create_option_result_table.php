<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('option_result', function (Blueprint $table) {
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('option_id');
            // Ajoutez d'autres colonnes si nécessaire
            

            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->timestamps();
        });
      
    }

    public function down()
    {
        Schema::dropIfExists('option_result');
    }
};
