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
            $table->id('id_curso'); // Campo con autoincremento y llave primaria
            $table->unsignedBigInteger('id'); // Llave foránea
            $table->string('nombre', 100); // Campo con longitud máxima de 100 caracteres
            $table->text('descripcion')->nullable(); // Campo de texto opcional
            $table->integer('duracion')->nullable(); // Duración en horas, opcional
            $table->date('fecha_inicio')->nullable(); // Fecha de inicio opcional
            $table->date('fecha_fin')->nullable(); // Fecha de fin opcional

            // Definición de la llave foránea correctamente
            $table->foreign('id')->references('id')->on('areas')->onDelete('cascade');

            $table->timestamps(); // Campos para 'created_at' y 'updated_at'
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
