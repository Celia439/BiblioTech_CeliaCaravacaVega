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
        $table->id();
        $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('ejemplar_id')->constrained('ejemplares')->onDelete('cascade');
        $table->date('fecha_reserva');
        $table->enum('estado', ['activa', 'cancelada', 'completada']);
        $table->text('observacion')->nullable();
        $table->timestamps();
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
