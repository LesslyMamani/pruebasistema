<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar un usuario específico
    public function show($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    // Crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar un usuario
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$/',
            'apellido_p' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$/',
            'apellido_m' => 'required|regex:/^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$/',
            'estado' => 'required|in:1,0',
            'carnet' => 'required|unique:usuarios,carnet|regex:/^[0-9]+$/',
            'expedido' => 'required|in:BN,CH,CB,LP,OR,PA,PT,SC,TJ',
            'fecha_nac' => 'nullable|date',
            'telefono' => 'nullable|string',
            'nombre_rol' => 'required|in:Usuario,Expositor',
            'nombre_area' => 'required|in:Docente,Administrativo,Externo,Estudiante',
        ]);

        try {
            // Crear el nuevo usuario
            $usuario = new Usuario();
            $usuario->nombre = $request->nombre;
            $usuario->apellido_p = $request->apellido_p;
            $usuario->apellido_m = $request->apellido_m;
            $usuario->estado = $request->estado;
            $usuario->carnet = $request->carnet;
            $usuario->expedido = $request->expedido;
            $usuario->fecha_nac = $request->fecha_nac;
            $usuario->telefono = $request->telefono;
            $usuario->nombre_rol = $request->nombre_rol;
            $usuario->nombre_area = $request->nombre_area;

            // Asignar manualmente las fechas de creación y actualización
            $usuario->created_at = now();
            $usuario->updated_at = now();

            // Guardar el usuario
            $usuario->save();

            // Redirigir con mensaje de éxito
            return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
        } catch (\Throwable $th) {
            // Redirigir con mensaje de error
            return redirect()->route('usuarios.index')->with('error', 'Error al crear el usuario: ' . $th->getMessage());
        }
    }

    // Editar usuario
    public function edit($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);

        if (!$usuario) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
        }

        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id_usuario)
    {
        $usuario = Usuario::find($id_usuario);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'string|regex:/^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$/',
            'apellido_p' => 'string|regex:/^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$/',
            'apellido_m' => 'string|regex:/^[A-Za-záéíóúÁÉÍÓÚüÜñÑ]+$/',
            'estado' => 'in:1,0',
            'carnet' => 'regex:/^[0-9]+$/|unique:usuarios,carnet,' . $id_usuario . ',id_usuario',
            'expedido' => 'in:BN,CH,CB,LP,OR,PA,PT,SC,TJ',
            'telefono' => 'nullable|string',
            'nombre_rol' => 'in:Usuario,Expositor',
            'nombre_area' => 'in:Docente,Administrativo,Externo,Estudiante',
        ]);

        // Actualizar el usuario
        $usuario->update($request->all());

        return response()->json(['mensaje' => 'Usuario actualizado correctamente', 'usuario' => $usuario]);
    }

    // Eliminar un usuario
    public function destroy($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);

        if (!$usuario) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['mensaje' => 'Usuario eliminado']);
    }
}
