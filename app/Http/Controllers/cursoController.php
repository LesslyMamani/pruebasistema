<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Area;

class cursoController extends Controller
{


    public function index()
    {
        $cursos = Curso::with('area')->where('estado', 1)->get(); // Incluye el área asociada al curso
        $areas = Area::all()->where('estado', 1); // Obtén todas las áreas
        return view('cursos.index', compact('cursos', 'areas'));
    }



    public function create()
{
    $areas = Area::all(); // Obtener todas las áreas
    return view('cursos.create', compact('areas'));
}


    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|string',
            'duracion' => 'nullable|integer|min:1',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'id_area' => 'required|exists:areas,id', // Validar que el área exista
        ], [
            'nombre.required' => 'El campo Nombre del Curso es obligatorio.',
            'nombre.max' => 'El campo Nombre del Curso no puede tener más de 100 caracteres.',
            'duracion.integer' => 'La duración debe ser un número entero.',
            'duracion.min' => 'La duración debe ser al menos de 1 hora.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'id_area.required' => 'El campo Área es obligatorio.',
            'id_area.exists' => 'El área seleccionada no existe.',
        ]);

        // Curso::create($request->all());
        Curso::create($request->only('nombre', 'descripcion', 'duracion', 'fecha_inicio', 'fecha_fin', 'id_area'));
        return redirect()->route('curso')->with('success', 'Curso creado con éxito.');
    }




    public function edit($id_curso)
{
    $curso = Curso::findOrFail($id_curso);
    // Filtrar solo las áreas cuyo estado no sea 0
    $areas = Area::where('estado', '!=', 0)->get();

    // Verificar qué áreas se están pasando
    dd($areas);

    return view('cursos.edit', compact('curso', 'areas'));
}


    public function update(Request $request, $id_curso)
    {
        // Validar los datos enviados
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|string',
            'duracion' => 'nullable|integer|min:1',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'id_area' => 'required|exists:areas,id', // Validar que el área exista
        ], [
            'nombre.required' => 'El campo Nombre del Curso es obligatorio.',
            'nombre.max' => 'El campo Nombre del Curso no puede tener más de 100 caracteres.',
            'duracion.integer' => 'La duración debe ser un número entero.',
            'duracion.min' => 'La duración debe ser al menos de 1 hora.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',
            'id_area.required' => 'El campo Área es obligatorio.',
            'id_area.exists' => 'El área seleccionada no existe.',
        ]);

        // // Buscar el curso por ID
        // $curso = Curso::findOrFail($id_curso);
        // // Actualizar los datos
        // $curso->update($request->all());

         // Buscar el curso por ID
    $curso = Curso::findOrFail($id_curso);

    // Actualizar los datos
    $curso->update($request->only('nombre', 'descripcion', 'duracion', 'fecha_inicio', 'fecha_fin', 'id_area'));

    // Redirigir a la lista de cursos con un mensaje de éxito
    return redirect()->route('curso')->with('success', 'Curso actualizado correctamente.');
}


    // Eliminar un curso
    public function destroy(Curso $curso)
    {
        $curso->estado = 0; // Marcar como inactivo
        $curso->update();

        return redirect()->route('curso')->with('success', 'Curso eliminado con éxito.');
    }
}
