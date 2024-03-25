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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('universidad');
            $table->integer('año');
            $table->string('asignatura');
            $table->string('tema');
            $table->string('pregunta');
            $table->string('imagen')->nullable();
            $table->integer('estado')->default(1);
            $table->unsignedBigInteger('texto_id')->nullable();
            $table->foreign('texto_id')->references('id')->on('textos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
