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
        Schema::create('confirmdetailsresults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('confirmresult_id');
            $table->foreign('confirmresult_id')->references('id')->on('confirmresults')->onDelete('cascade');
            $table->string('factor');
            $table->string('descripcion');
            $table->integer('ponderacion');
            $table->float('nota');
            $table->string('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmdetailsresults');
    }
};
