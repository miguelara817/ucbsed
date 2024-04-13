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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evalprocess_id');
            $table->foreign('evalprocess_id')->references('id')->on('evalproces')->onDelete('cascade');
            $table->unsignedBigInteger('evaluador_id');
            $table->foreign('evaluador_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('evaluado_id');
            $table->foreign('evaluado_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('evaluador_calificacion')->default(0);
            $table->boolean('evaluado_calificacion')->default(0);
            $table->boolean('finalizacion')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
