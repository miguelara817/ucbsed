<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auxiliarforms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formmodel_id');
            $table->foreign('formmodel_id')->references('id')->on('formmodels')->onDelete('cascade');

            $table->string('factor');
            $table->string('descripcion');
            $table->string('competencia');

            $table->integer('ponderacion');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auxiliarforms');
    }
};
