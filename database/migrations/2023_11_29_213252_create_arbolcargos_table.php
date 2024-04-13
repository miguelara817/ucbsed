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
        Schema::create('arbolcargos', function (Blueprint $table) {
            $table->id();
            $table->string('cargo_dependiente');

            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('niveles')->onDelete('cascade');
            
            $table->unsignedBigInteger('cargo_jefe');
            $table->foreign('cargo_jefe')->references('id')->on('jcargos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arbolcargos');
    }
};
