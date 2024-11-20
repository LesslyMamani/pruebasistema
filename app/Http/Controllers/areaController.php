<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    // Mostrar listado de áreas
    public function index()
    {
        $areas = Area::where('estado', 1)->get();

        return view('area.index', compact('areas'));
    }

    // Mostrar formulario para crear un área
    public function create()
    {
        return view('area.create');
    }

    // Guardar un área en la base de datos
    public function store(Request $request)
    {
        // Validación ajustada
        $request->validate([
            'nombre' => [
                'required',
                'max:50',  // Limita la longitud a 50 caracteres
                'regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',  // Solo permite letras y un espacio entre palabras, no más de dos espacios consecutivos
            ],
        ], [
            'nombre.required' => 'El campo Nombre del Área es obligatorio.',
            'nombre.max' => 'El campo Nombre del Área no puede tener más de 50 caracteres.',
            'nombre.regex' => 'El campo Nombre del Área solo puede contener letras y un espacio entre palabras, sin más de dos espacios consecutivos.',
        ]);

        // Crear el área en la base de datos
        Area::create($request->all());
        return redirect()->route('area.index')->with('success', 'Área creada con éxito.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $area = Area::findOrFail($id); // Busca el área por ID
        return view('area.edit', compact('area')); // Pasa el área a la vista
    }

    // Actualizar área
    public function update(Request $request, $id)
    {
        // Validar los datos enviados
        $request->validate([
            'nombre' => [
                'required',
                'max:50',  // Limita la longitud a 50 caracteres
                'regex:/^[a-zA-Z]+( [a-zA-Z]+)*$/',  // Solo permite letras y un espacio entre palabras, no más de dos espacios consecutivos
            ],
        ], [
            'nombre.required' => 'El campo Nombre del Área es obligatorio.',
            'nombre.max' => 'El campo Nombre del Área no puede tener más de 50 caracteres.',
            'nombre.regex' => 'El campo Nombre del Área solo puede contener letras y un espacio entre palabras, sin más de dos espacios consecutivos.',
        ]);

        // Buscar el área por ID
        $area = Area::findOrFail($id);

        // Solo actualizar si hay cambios
        if ($area->nombre !== $request['nombre']) {
            $area->update([
                'nombre' => $request['nombre'],
            ]);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('area.index')->with('success', 'Área actualizada correctamente.');
    }

    // Eliminar un área
    public function destroy(Area $area)
    {
        /* $area->delete(); */
        $area->estado=0;
        $area->update();
        return redirect()->route('area.index')->with('success', 'Área eliminada con éxito.');
    }



}
