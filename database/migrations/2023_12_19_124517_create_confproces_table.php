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
        Schema::create('confproces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_version_id');
            $table->foreign('form_version_id')->references('id')->on('conformmodels')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_conclusion');
            $table->unsignedBigInteger('evaluador_id');
            $table->foreign('evaluador_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('evaluado_id');
            $table->foreign('evaluado_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('recomendado')->default(0);
            $table->boolean('finalizacion')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confproces');
    }
};
