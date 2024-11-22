<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Ejecutar las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Asegúrate de que use InnoDB
            $table->id('id_inscripcion');
            $table->unsignedBigInteger('id_usuario');  // Relación con usuarios
            $table->unsignedBigInteger('id_curso');   // Relación con cursos
            $table->date('fecha_inscripcion');
            $table->enum('estado', ['Inscrito', 'Completado', 'Cancelado'])->default('Inscrito');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Deshacer las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
