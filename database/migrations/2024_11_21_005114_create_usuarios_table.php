<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
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
            $table->check('nombre REGEXP "^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$"');
            $table->check('apellido_p REGEXP "^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$"');
            $table->check('apellido_m REGEXP "^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$"');
            $table->check('carnet REGEXP "^[0-9]+$"');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
