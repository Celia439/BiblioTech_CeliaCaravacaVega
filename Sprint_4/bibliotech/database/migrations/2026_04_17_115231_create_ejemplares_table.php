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
        Schema::create('ejemplares', function (Blueprint $table) {
            $table->id('id_ejemplar');
            $table->foreignId('id_libro')->constrained('libros', 'id_libro');
            $table->string('codigo_barra', 50);
            $table->enum('estado', ['disponible', 'prestado', 'reservado', 'perdido'])->default('disponible');
            $table->foreignId('id_estanteria')->constrained('estanterias', 'id_estanteria');
            $table->date('fecha_alta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejemplares');
    }
};
