<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    // Si la clave primaria es 'id', no es necesario declararla explícitamente,
    // pero la puedes especificar si quieres ser más claro.
    protected $primaryKey = 'id';

    // Si no usas timestamps (created_at y updated_at), puedes desactivar esto
    public $timestamps = true;

    // Especificamos los campos asignables
    protected $fillable = ['nombre'];
}
