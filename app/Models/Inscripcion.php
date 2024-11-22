<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $table = 'inscripciones';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'id_usuario', 
        'id_curso', 
        'fecha_inscripcion', 
        'estado'
    ];

    // Definir las relaciones con los modelos de Usuario y Curso
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

    // Opcional: Si tienes una fecha de creación o de actualización personalizada
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
