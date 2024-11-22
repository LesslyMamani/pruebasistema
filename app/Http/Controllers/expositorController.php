<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expositor;

class ExpositorController extends Controller
{
    public function index()
    {
        // Obtener todos los expositores activos
        $usuarios = Expositor::all(); // Suponiendo que el estado 1 es activo
        return view('expositor.index', compact('usuarios'));
    }

    public function create()
    {
        return view('expositor.create');
    }
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido_p' => 'nullable|string|max:100',
            'apellido_m' => 'nullable|string|max:100',
            'carnet' => 'nullable|string|max:50',
            'fecha_nac' => 'nullable|date',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        // Crear un nuevo expositor con los datos validados
        Expositor::create([
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'carnet' => $request->carnet,
            'fecha_nac' => $request->fecha_nac,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'estado' => 1, // Estado activo por defecto
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Expositor creado con éxito.');
    }

    public function edit($id_usuario)
    {
        // Obtener los datos del expositor
        $usuarios = Expositor::findOrFail($id_usuario);
        return view('expositor.edit', compact('expositor'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los campos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'carnet' => 'required|string|max:255',
            'fecha_nac' => 'required|date',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:255',
        ]);

        // Buscar el expositor (usuario) por su ID
        $expositor = Expositor::findOrFail($id);

        // Actualizar los datos del expositor con los valores del formulario
        $expositor->nombre = $validated['nombre'];
        $expositor->apellido_p = $validated['apellido_p'];
        $expositor->apellido_m = $validated['apellido_m'];
        $expositor->carnet = $validated['carnet'];
        $expositor->fecha_nac = $validated['fecha_nac'];
        $expositor->correo = $validated['correo'];
        $expositor->telefono = $validated['telefono'];

        // Guardar los cambios en la base de datos
        $expositor->save();

        // Redirigir al listado de expositores con un mensaje de éxito
        return redirect()->back()->with('success', 'Expositor actualizado correctamente.');
    }


    // Eliminar un expositor (inactivarlo)
    public function destroy(Expositor $usuario)
    {
        // Validar que el usuario exista y actualizar el estado a inactivo
        $usuario->estado = 0; // Marcar como inactivo
        $usuario->save(); // Utiliza save() para guardar el cambio

        return redirect()->back()->with('success', 'Expositor marcado como inactivo con éxito.');
    }

}
