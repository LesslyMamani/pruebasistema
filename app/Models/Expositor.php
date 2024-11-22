<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expositor extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'usuarios';

    protected $primaryKey = 'id_usuario';

    // Columnas que se pueden llenar masivamente
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
        'estado',
    ];

    // Definir los valores por defecto de las columnas (opcional)
    protected $attributes = [
        'estado' => 1, // Suponiendo que 1 es el estado activo por defecto
    ];

    // Definir los campos de fecha (si es necesario para tu caso)
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Método para obtener los expositores activos
    public static function activos()
    {
        return self::where('estado', 1)->get();  // Devuelve los expositores con estado activo
    }
}
