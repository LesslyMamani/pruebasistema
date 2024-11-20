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
                                <div class="nftmax-table__heading">
                                    <h3 class="nftmax-table__title mb-0">TABLA USUARIOS</h3>
                                    <ul class="nav nav-tabs nftmax-dropdown__list" id="nav-tab" role="tablist">
                                        <li class="nav-item dropdown">
                                            <div>
                                                <!-- Botón para abrir el modal de crear usuario -->
                                                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                                    Crear Usuario
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="table_1" role="tabpanel">
                                        <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v1">
                                            <thead class="nftmax-table__head">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Usuario</th>
                                                    <th>Contraseña</th>
                                                    <th>Nombre Completo</th>
                                                    <th>Carnet</th>
                                                    <th>Fecha Nac</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <th>Rol</th>
                                                    <th>Area</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($usuarios as $use)
                                                    <tr>
                                                        <td>{{ $use->id_usuario }}</td>
                                                        <td>{{ $use->nombre_usuario }}</td>
                                                        <td>{{ $use->contrasena }}</td>
                                                        <td>{{ $use->nombre }} {{ $use->apellido_p }} {{ $use->apellido_m }}</td>
                                                        <td>{{ $use->carnet }}</td>
                                                        <td>{{ $use->fecha_nac }}</td>
                                                        <td>{{ $use->correo }}</td>
                                                        <td>{{ $use->telefono }}</td>
                                                        <td>{{ $use->nombre_rol }}</td>
                                                        <td>{{ $use->nombre_area }}</td>

                                                        <td>
                                                            <!-- Botón para ver detalles -->

                                                            <!-- Botón para editar usuario -->
                                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $use->id_usuario }}">
                                                                Editar
                                                            </button>

                                                            <!-- Formulario para eliminar usuario -->
                                                            <form action="{{ route('usuarios.destroy', $use->id_usuario) }}" method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
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
            </div>
        </section>
    </div>

    <!-- Modal para Crear Usuario -->
    @include('usuarios.create')

    <!-- Modal para Editar Usuario -->
    @include('usuarios.edit')
@endsection
