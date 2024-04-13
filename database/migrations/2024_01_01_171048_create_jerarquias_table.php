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
        Schema::create('jerarquias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cargo_jefe');
            $table->foreign('cargo_jefe')->references('id')->on('cargos');
            $table->unsignedBigInteger('cargo_dependiente');
            $table->foreign('cargo_dependiente')->references('id')->on('cargos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jerarquias');
    }
};
