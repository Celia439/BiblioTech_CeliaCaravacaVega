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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_reserva');
            $table->foreignId('id_usuario')->constrained('users', 'id_usuario');
            $table->foreignId('id_ejemplar')->constrained('ejemplares', 'id_ejemplar');
            $table->date('fecha_reserva');
            $table->text('observacion')->nullable();
            $table->enum('estado', ['activa', 'caducada', 'cumplida', 'cancelada'])->default('activa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
