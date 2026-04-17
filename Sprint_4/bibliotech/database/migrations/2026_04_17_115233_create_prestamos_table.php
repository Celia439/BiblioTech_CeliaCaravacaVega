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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('id_prestamo');
            $table->foreignId('id_usuario_lector')->constrained('users', 'id_usuario');
            $table->foreignId('id_ejemplar')->constrained('ejemplares', 'id_ejemplar');
            $table->foreignId('id_bibliotecario')->constrained('users', 'id_usuario');
            $table->date('fecha_prestamo');
            $table->date('fecha_limite');
            $table->date('fecha_devolucion')->nullable();
            $table->text('observacion')->nullable();
            $table->enum('estado', ['activo', 'devuelto', 'retrasado'])->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
