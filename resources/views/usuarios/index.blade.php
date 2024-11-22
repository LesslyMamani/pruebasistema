@extends('dashboard.app')

@section('content')
    <div>
        <h4>Usuarios</h4>
        <section class="nftmax-adashboard nftmax-show">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-9 col-12 nftmax-main__column">
                        <div class="nftmax-body">
                            <div class="nftmax-table mg-top-40">
                                <div class="nftmax-table__heading d-flex justify-content-between align-items-center">
                                    <h3 class="nftmax-table__title mb-0">TABLA USUARIOS</h3>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                        Crear Usuario
                                    </button>
                                </div>
        
                                <div class="table-responsive mt-3">
                                    <table id="nftmax-table__main" class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre Completo</th>
                                                <th>Estado</th>
                                                <th>Carnet</th>
                                                <th>Fecha Nac</th>
                                                <th>Teléfono</th>
                                                <th>Rol</th>
                                                <th>Área</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $use)
                                                <tr>
                                                    <td>{{ $use->id_usuario }}</td>
                                                    <td>{{ $use->nombre }} {{ $use->apellido_p }} {{ $use->apellido_m }}</td>
                                                    <td>
                                                        <span class="badge {{ $use->ativo == '1' ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $use->ativo == '1' ? 'Activo' : 'Inactivo' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $use->carnet }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($use->fecha_nac)->format('d/m/Y') }}</td>
                                                    <td>{{ $use->telefono }}</td>
                                                    <td>{{ $use->nombre_rol }}</td>
                                                    <td>{{ $use->nombre_area }}</td>
                                                    <td class="d-flex gap-2">
                                                        <!-- Botón para editar usuario -->
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $use->id_usuario }}">
                                                            Editar
                                                        </button>
        
                                                        <!-- Formulario para eliminar usuario -->
                                                        <form action="{{ route('usuarios.destroy', $use->id_usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>

    <!-- Modal para Crear Usuario -->
    @include('usuarios.create')

    <!-- Modal para Editar Usuario -->
    @include('usuarios.edit')
@endsection
