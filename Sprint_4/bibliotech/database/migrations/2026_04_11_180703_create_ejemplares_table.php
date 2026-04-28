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
        $table->string('codigo_barra')->unique();
        $table->enum('estado', ['disponible', 'reservado', 'prestado']);
        $table->date('fecha_alta')->nullable();
        $table->foreignId('id_libro')->constrained('libros', 'id_libro')->onDelete('cascade');
        $table->foreignId('id_estanteria')->nullable()->constrained('estanterias', 'id_estanteria')->nullOnDelete();
        $table->timestamps();
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
