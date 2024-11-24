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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso'); // ID del curso
            $table->unsignedBigInteger('id_area')->after('estado'); // Llave foránea
            $table->string('nombre', 100); // Nombre del curso
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->integer('duracion')->nullable(); // Duración en horas
            $table->date('fecha_inicio')->nullable(); // Fecha de inicio
            $table->date('fecha_fin')->nullable(); // Fecha de fin
            $table->enum('estado', ['1', '0'])->default('1'); // Estado (1=activo, 0=inactivo)
            $table->timestamps(); // Campos para created_at y updated_at

            // Llave foránea para el área
            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
