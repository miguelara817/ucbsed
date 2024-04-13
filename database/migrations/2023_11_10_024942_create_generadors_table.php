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
        Schema::create('generadors', function (Blueprint $table) {
            $table->id();
            $table->string('creador');
            $table->string('contrato');
            $table->string('evaluado');
            $table->string('puesto');
            $table->string('evaluador');
            $table->string('evaluador_puesto');
            $table->date('fecha_evaluacion');
            $table->date('fecha_cumplimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generadors');
    }
};
