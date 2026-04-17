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
            $table->id('id_libro');
            $table->string('isbn', 20);
            $table->string('titulo', 255);
            $table->string('autor', 150);
            $table->string('editorial', 100);
            $table->integer('anio_publicacion'); // MySQL year(4)
            $table->string('idioma', 50);
            $table->integer('num_paginas');
            $table->integer('cantidad');
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['activo', 'deshabilitado'])->default('activo');
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
