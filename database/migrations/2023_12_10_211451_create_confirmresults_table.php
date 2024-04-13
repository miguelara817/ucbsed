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
        Schema::create('confirmresults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('confirmprocess_id');
            $table->foreign('confirmprocess_id')->references('id')->on('confirmproces')->onDelete('cascade');
            $table->unsignedBigInteger('evaluado_id');
            $table->foreign('evaluado_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('evaluado_nivel_id');
            $table->foreign('evaluado_nivel_id')->references('id')->on('niveles')->onDelete('cascade');

            $table->unsignedBigInteger('evaluador_id');
            $table->foreign('evaluador_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('fortalezas', 1000);
            $table->string('debilidades', 1000);
            $table->string('comentarios_evaluador', 1000);
            $table->string('propuestas', 1000);
            $table->float('nota_final')->default(0);
            $table->string('comentarios_evaluado', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmresults');
    }
};
