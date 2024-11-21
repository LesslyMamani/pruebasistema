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
        $request->validate([
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario',
            'contrasena' => 'required|string',
            'nombre' => 'required|regex:/^[a-zA-Z]+$/',
            'apellido_p' => 'required|regex:/^[a-zA-Z]+$/',
            'apellido_m' => 'required|regex:/^[a-zA-Z]+$/',
            'ative' => 'required|in:1,0',
            'carnet' => 'required|digits_between:1,50|unique:usuarios,carnet',
            'correo' => 'nullable|email|unique:usuarios,correo',
            'fecha_nac' => 'nullable|date',
            'telefono' => 'nullable|string',
            'nombre_rol' => 'required|in:Admin,Usuario,Expositor',
            'nombre_area' => 'required|in:Docente,Administrativo,Externo,Estudiante',
        ]);

        try {
            $usuario = Usuario::create($request->all());
            return response()->json(['mensaje' => 'Usuario creado', 'usuario' => $usuario], 201);
        } catch (\Throwable $th) {
            return response()->json(['mensaje' => 'Error al crear usuario'], 500);
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

        $request->validate([
            'nombre_usuario' => 'string|unique:usuarios,nombre_usuario,' . $id_usuario . ',id_usuario',
            'contrasena' => 'string',
            'nombre' => 'string|regex:/^[a-zA-Z]+$/',
            'apellido_p' => 'string|regex:/^[a-zA-Z]+$/',
            'apellido_m' => 'string|regex:/^[a-zA-Z]+$/',
            'ative' => 'in:1,0',
            'carnet' => 'digits_between:1,50|unique:usuarios,carnet,' . $id_usuario . ',id_usuario',
            'correo' => 'nullable|email|unique:usuarios,correo,' . $id_usuario . ',id_usuario',
            'telefono' => 'nullable|string',
            'nombre_rol' => 'in:Admin,Usuario,Expositor',
            'nombre_area' => 'in:Docente,Administrativo,Externo,Estudiante',
        ]);

        $usuario->update($request->all());
        return response()->json(['mensaje' => 'Usuario actualizado', 'usuario' => $usuario]);
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
