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
        Schema::create('evalxcomps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evalresult_id');
            $table->foreign('evalresult_id')->references('id')->on('evalresults')->onDelete('cascade');
            $table->string('competencia');
            $table->float('nota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evalxcomps');
    }
};
