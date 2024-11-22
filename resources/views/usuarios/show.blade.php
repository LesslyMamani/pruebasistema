@extends('dashboard.app')


@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <p><strong>ID:</strong> {{ $usuario->id_usuario }}</p>
    <p><strong>Nombre:</strong> {{ $usuario->nombre }} {{ $usuario->apellido_p }} {{ $usuario->apellido_m }}</p>
    <p><strong>Correo:</strong> {{ $usuario->correo }}</p>
    <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
    <p><strong>Rol:</strong> {{ $usuario->nombre_rol }}</p>
    <p><strong>Área:</strong> {{ $usuario->nombre_area }}</p>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
