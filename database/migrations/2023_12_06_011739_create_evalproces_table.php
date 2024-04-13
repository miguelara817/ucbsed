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
        Schema::create('evalproces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_version_id');
            $table->foreign('form_version_id')->references('id')->on('formmodels')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_conclusion');
            $table->boolean('finalizacion')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evalproces');
    }
};
