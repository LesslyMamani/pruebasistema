<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla

    protected $primaryKey = 'id_usuario'; // Llave primaria personalizada

    public $timestamps = false; // Desactivar timestamps (created_at y updated_at)

    protected $fillable = [
        'nombre_usuario',
        'contrasena',
        'nombre',
        'apellido_p',
        'apellido_m',
        'carnet',
        'fecha_nac',
        'correo',
        'telefono',
        'nombre_rol',
        'nombre_area',
    ];
}
