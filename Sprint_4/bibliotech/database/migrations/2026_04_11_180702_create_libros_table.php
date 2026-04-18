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
    Schema::create('libros', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->string('autor');
        $table->text('descripcion')->nullable();
        $table->string('editorial')->nullable();
        $table->year('anio_publicacion')->nullable();
        $table->string('isbn')->unique();
        $table->integer('num_paginas')->nullable();
        $table->integer('cantidad')->default(1);
        $table->string('idioma')->nullable();
        $table->enum('estado', ['activo', 'inactivo']);
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
