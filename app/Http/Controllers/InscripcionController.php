<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Usuario;
use App\Models\Curso;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    // Mostrar todas las inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::all(); // Obtener todas las inscripciones
        return view('inscripciones.index', compact('inscripciones')); // Mostrar en la vista
    }

    // Mostrar una inscripción específica
    public function show($id_inscripcion)
    {
        $inscripcion = Inscripcion::find($id_inscripcion);

        if (!$inscripcion) {
            return response()->json(['mensaje' => 'Inscripción no encontrada'], 404);
        }

        return response()->json($inscripcion);
    }

    // Mostrar el formulario para crear una nueva inscripción
    public function create()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('inscripciones.create', compact('usuarios', 'cursos')); // Pasar los datos a la vista
    }

    // Almacenar una nueva inscripción
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',  // Verificar que el usuario existe
            'id_curso' => 'required|exists:cursos,id_curso',  // Verificar que el curso existe
            'fecha_inscripcion' => 'required|date',  // Validar que la fecha sea una fecha válida
            'estado' => 'required|in:Inscrito,Completado,Cancelado',  // Validar los valores posibles de estado
        ]);

        try {
            // Crear una nueva inscripción
            $inscripcion = new Inscripcion();
            $inscripcion->id_usuario = $request->id_usuario;
            $inscripcion->id_curso = $request->id_curso;
            $inscripcion->fecha_inscripcion = $request->fecha_inscripcion;
            $inscripcion->estado = $request->estado;

            // Guardar la inscripción
            $inscripcion->save();

            // Redirigir con un mensaje de éxito
            return redirect()->route('inscripciones.index')->with('success', 'Inscripción creada correctamente');
        } catch (\Throwable $th) {
            // Redirigir con un mensaje de error
            return redirect()->route('inscripciones.index')->with('error', 'Error al crear la inscripción: ' . $th->getMessage());
        }
    }

    // Mostrar el formulario para editar una inscripción existente
    public function edit($id_inscripcion)
    {
        $inscripcion = Inscripcion::find($id_inscripcion);

        if (!$inscripcion) {
            return redirect()->route('inscripciones.index')->with('error', 'Inscripción no encontrada');
        }

        $usuarios = Usuario::all();
        $cursos = Curso::all();

        return view('inscripciones.edit', compact('inscripcion', 'usuarios', 'cursos'));
    }

    // Actualizar una inscripción existente
    public function update(Request $request, $id_inscripcion)
    {
        $inscripcion = Inscripcion::find($id_inscripcion);

        if (!$inscripcion) {
            return response()->json(['mensaje' => 'Inscripción no encontrada'], 404);
        }

        // Validar los datos de entrada
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id_usuario',
            'id_curso' => 'required|exists:cursos,id_curso',
            'fecha_inscripcion' => 'required|date',
            'estado' => 'required|in:Inscrito,Completado,Cancelado',
        ]);

        // Actualizar la inscripción
        $inscripcion->update($request->all());

        return response()->json(['mensaje' => 'Inscripción actualizada correctamente', 'inscripcion' => $inscripcion]);
    }

    // Eliminar una inscripción
    public function destroy($id_inscripcion)
    {
        $inscripcion = Inscripcion::find($id_inscripcion);

        if (!$inscripcion) {
            return response()->json(['mensaje' => 'Inscripción no encontrada'], 404);
        }

        $inscripcion->delete();
        return response()->json(['mensaje' => 'Inscripción eliminada']);
    }
}
