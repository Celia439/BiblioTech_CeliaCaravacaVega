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
    Schema::create('multas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('prestamo_id')->unique()->constrained('prestamos')->onDelete('cascade');
        $table->date('fecha');
        $table->decimal('importe', 8, 2);
        $table->boolean('pagada')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multas');
    }
};
