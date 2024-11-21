<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'cursos';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_curso';

    // Indica si la clave primaria es incremental
    public $incrementing = true;

    // Tipo de dato de la clave primaria
    protected $keyType = 'int';

    // Indica si el modelo usa las columnas de timestamps (created_at y updated_at)
    public $timestamps = true;

    // Campos que pueden ser asignados de manera masiva
    protected $fillable = [
        'nombre', 'descripcion', 'duracion', 'fecha_inicio', 'fecha_fin', 'estado', 'id_area'
    ];

    // Relación con la tabla 'areas' (llave foránea 'id')

    public function area()
    {
    return $this->belongsTo(Area::class, 'id_area');
    }
}
