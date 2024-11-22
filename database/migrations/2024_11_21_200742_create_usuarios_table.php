<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 50);
            $table->string('apellido_p', 50);
            $table->string('apellido_m', 50);
            $table->enum('estado', ['1', '0'])->default('1');
            $table->string('carnet', 50)->unique();
            $table->enum('expedido', ['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']);
            $table->date('fecha_nac')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->enum('nombre_rol', ['Usuario', 'Expositor']);
            $table->enum('nombre_area', ['Docente', 'Administrativo', 'Externo', 'Estudiante']);
            $table->timestamps();
        });

        // Agregar las restricciones CHECK usando SQL
        DB::statement('ALTER TABLE usuarios ADD CONSTRAINT nombre_check CHECK (nombre REGEXP "^[A-Z")');
        DB::statement('ALTER TABLE usuarios ADD CONSTRAINT apellido_p_check CHECK (apellido_p REGEXP "^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$")');
        DB::statement('ALTER TABLE usuarios ADD CONSTRAINT apellido_m_check CHECK (apellido_m REGEXP "^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$")');
        DB::statement('ALTER TABLE usuarios ADD CONSTRAINT carnet_check CHECK (carnet REGEXP "^[0-9]+$")');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar las restricciones CHECK si es necesario
        DB::statement('ALTER TABLE usuarios DROP CONSTRAINT nombre_check');
        DB::statement('ALTER TABLE usuarios DROP CONSTRAINT apellido_p_check');
        DB::statement('ALTER TABLE usuarios DROP CONSTRAINT apellido_m_check');
        DB::statement('ALTER TABLE usuarios DROP CONSTRAINT carnet_check');

        Schema::dropIfExists('usuarios');
    }
};
