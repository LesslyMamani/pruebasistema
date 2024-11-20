<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

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
        $usuarios = Usuario::all();

        return view('usuarios.create');
    }

    public function store(Request $request)
    {

        $errors = $request->validate([
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario',
            'contrasena' => 'required|string',
            'nombre' => 'required|string',
            'apellido_p' => 'required|string',
            'apellido_m' => 'required|string',
            'carnet' => 'required|string',
            'nombre_rol' => 'required|in:Admin,Usuario,Expositor',
            'nombre_area' => 'required|in:Docente,Administrativo,Externo,Estudiante',
        ]);

        $usuario = Usuario::create($request->all());
        try {
            return response()->json(['mensaje' => 'Usuario creado'], 201);
        } catch (\Throwable $th) {
            return response()->json(['mensaje' => 'Usuario no creado', 'errors'=>$errors],500);
        }
       
    }
    // editar
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
            'nombre' => 'string',
            'apellido_p' => 'string',
            'apellido_m' => 'string',
            'carnet' => 'string',
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
