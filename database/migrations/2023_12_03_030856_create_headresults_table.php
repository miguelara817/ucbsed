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
        Schema::create('headresults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nombre_evaluado');
            $table->string('cargo_evaluado');
            $table->string('nivel_evaluado');
            $table->string('nombre_evaluador');
            $table->string('cargo_evaluador');
            $table->string('nivel_evaluador');
            $table->unsignedBigInteger('version_form');
            $table->foreign('version_form')->references('id')->on('formmodels')->onDelete('cascade');
            $table->date('periodo_inicio');
            $table->date('periodo_final');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headresults');
    }
};
