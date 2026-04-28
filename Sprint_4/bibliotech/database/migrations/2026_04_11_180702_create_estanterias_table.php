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
    Schema::create('estanterias', function (Blueprint $table) {
        $table->id('id_estanteria');
        $table->string('codigo')->unique();
        $table->string('seccion')->nullable();
        $table->string('pasillo')->nullable();
        $table->text('descripcion')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estanterias');
    }
};
