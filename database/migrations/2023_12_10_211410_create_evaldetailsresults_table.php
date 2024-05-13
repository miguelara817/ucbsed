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
        Schema::create('evaldetailsresults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evalresult_id');
            $table->foreign('evalresult_id')->references('id')->on('evalresults')->onDelete('cascade');
            $table->string('factor');
            $table->string('descripcion');
            $table->string('competencia');
            $table->integer('ponderacion');
            $table->float('nota');
            $table->unsignedBigInteger('criterio_id');
            $table->foreign('criterio_id')->references('id')->on('criterios')
            ->onDelete('cascade');
            $table->string('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaldetailsresults');
    }
};
