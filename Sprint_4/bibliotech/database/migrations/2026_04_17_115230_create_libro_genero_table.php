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
        Schema::create('libro_genero', function (Blueprint $table) {
            $table->foreignId('id_libro')->constrained('libros', 'id_libro');
            $table->foreignId('id_genero')->constrained('generos', 'id_genero');
            $table->primary(['id_libro', 'id_genero']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_genero');
    }
};
