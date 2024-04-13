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
        Schema::create('confirmforms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conformmodel_id');
            $table->foreign('conformmodel_id')->references('id')->on('conformmodels')->onDelete('cascade');

            $table->string('factor');
            $table->string('descripcion',500);
            $table->float('ponderacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmforms');
    }
};
