<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'estado',
        'carnet',
        'expedido',
        'fecha_nac',
        'telefono',
        'nombre_rol',
        'nombre_area'
    ];

    // Especificar la tabla si no es el plural de 'Usuario'
    protected $table = 'usuarios';

    // Definir la clave primaria
    protected $primaryKey = 'id_usuario';

    // Desactivar el manejo automático de timestamps (si lo prefieres)
    public $timestamps = true;

    // Funciones de validación y otras configuraciones pueden ser añadidas según sea necesario
}
