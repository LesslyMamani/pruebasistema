<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expositor;

class ExpositorController extends Controller

{
    public function index()
    {
        // Filtrar solo los usuarios cuyo nombre_rol sea "Expositor" y estado sea "1"
        $usuarios = Expositor::where('nombre_rol', 'Expositor')
                            ->where('estado', '1')
                            ->get();

        return view('expositor.index', compact('usuarios'));
    }
}
