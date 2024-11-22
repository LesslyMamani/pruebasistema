@extends('dashboard.app')

@section('content')
    <section class="nftmax-adashboard nftmax-show">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-12 nftmax-main__column">
                    <div class="nftmax-body">
                        <div class="nftmax-dsinner">
                            <div class="nftmax-table mg-top-100">
                                <div class="nftmax-table__heading">
                                    <h3 class="nftmax-table__title mb-0">Listado de Expositores</h3>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#crearUsuarioModal">Crear Nuevo Expositor</button>
                                </div>

                                <!-- Tabla -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="table_1" role="tabpanel"
                                        aria-labelledby="table_1">
                                        <table class="nftmax-table__main nftmax-table__main-v1">
                                            <thead class="nftmax-table__head">
                                                <tr>
                                                    <th class="nftmax-table__column-1 nftmax-table__h1">ID</th>
                                                    <th class="nftmax-table__column-2 nftmax-table__h2">Nombre</th>
                                                    <th class="nftmax-table__column-3 nftmax-table__h3">Apellido Paterno
                                                    </th>
                                                    <th class="nftmax-table__column-4 nftmax-table__h4">Apellido Materno
                                                    </th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h5">Carnet</th>
                                                    <th class="nftmax-table__column-6 nftmax-table__h6">Fecha Nacimiento
                                                    </th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h7">Correo</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h8">Telefono</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h9">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="nftmax-table__body">
                                                @foreach ($usuarios as $usuario)
                                                    <tr>
                                                        <td class="nftmax-table__column-1 nftmax-table__data-1">
                                                            {{ $usuario->id_usuario }}</td>
                                                        <td class="nftmax-table__column-2 nftmax-table__data-2">
                                                            {{ $usuario->nombre }}</td>
                                                        <td class="nftmax-table__column-3 nftmax-table__data-3">
                                                            {{ $usuario->apellido_p }}</td>
                                                        <td class="nftmax-table__column-4 nftmax-table__data-4">
                                                            {{ $usuario->apellido_m }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-5">
                                                            {{ $usuario->carnet }}</td>
                                                        <td class="nftmax-table__column-6 nftmax-table__data-6">
                                                            {{ $usuario->fecha_nac }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-7">
                                                            {{ $usuario->correo }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-8">
                                                            {{ $usuario->telefono }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-9">
                                                            <!-- Botón Editar -->
                                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#editarUsuarioModal{{ $usuario->id_usuario }}">
                                                                Editar
                                                            </button>
                                                            <!-- Botón Eliminar -->
                                                            <form
                                                                action="{{ route('expositor.destroy', $usuario->id_usuario) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal Crear Usuario -->
                                                    <div class="modal fade" id="crearUsuarioModal" tabindex="-1"
                                                        aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('expositor.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="crearUsuarioModalLabel">
                                                                            Crear Nuevo Expositor</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Campos del formulario -->
                                                                        <div class="mb-3">
                                                                            <label for="nombre"
                                                                                class="form-label">Nombre</label>
                                                                            <input type="text"
                                                                                class="form-control @error('nombre') is-invalid @enderror"
                                                                                id="nombre" name="nombre"
                                                                                value="{{ old('nombre') }}" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="apellido_p"
                                                                                class="form-label">Apellido Paterno</label>
                                                                            <input type="text"
                                                                                class="form-control @error('apellido_p') is-invalid @enderror"
                                                                                id="apellido_p" name="apellido_p"
                                                                                value="{{ old('apellido_p') }}" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="apellido_m"
                                                                                class="form-label">Apellido Materno</label>
                                                                            <input type="text"
                                                                                class="form-control @error('apellido_m') is-invalid @enderror"
                                                                                id="apellido_m" name="apellido_m"
                                                                                value="{{ old('apellido_m') }}" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="carnet"
                                                                                class="form-label">Carnet</label>
                                                                            <input type="text"
                                                                                class="form-control @error('carnet') is-invalid @enderror"
                                                                                id="carnet" name="carnet"
                                                                                value="{{ old('carnet') }}" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="fecha_nac" class="form-label">Fecha
                                                                                de Nacimiento</label>
                                                                            <input type="date"
                                                                                class="form-control @error('fecha_nac') is-invalid @enderror"
                                                                                id="fecha_nac" name="fecha_nac"
                                                                                value="{{ old('fecha_nac') }}" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="correo"
                                                                                class="form-label">Correo</label>
                                                                            <input type="email"
                                                                                class="form-control @error('correo') is-invalid @enderror"
                                                                                id="correo" name="correo"
                                                                                value="{{ old('correo') }}" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="telefono"
                                                                                class="form-label">Teléfono</label>
                                                                            <input type="tel"
                                                                                class="form-control @error('telefono') is-invalid @enderror"
                                                                                id="telefono" name="telefono"
                                                                                value="{{ old('telefono') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Crear</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Editar Usuario -->
                                                    <div class="modal fade"
                                                        id="editarUsuarioModal{{ $usuario->id_usuario }}" tabindex="-1"
                                                        aria-labelledby="editarUsuarioModalLabel{{ $usuario->id_usuario }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form
                                                                    action="{{ route('expositor.update', $usuario->id_usuario) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editarUsuarioModalLabel{{ $usuario->id_usuario }}">
                                                                            Editar Expositor</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <!-- Nombre -->
                                                                        <div class="mb-3">
                                                                            <label for="edit_nombre"
                                                                                class="form-label">Nombre</label>
                                                                            <input type="text"
                                                                                class="form-control @error('nombre') is-invalid @enderror"
                                                                                id="edit_nombre" name="nombre"
                                                                                value="{{ old('nombre', $usuario->nombre) }}"
                                                                                required>
                                                                        </div>

                                                                        <!-- Apellido Paterno -->
                                                                        <div class="mb-3">
                                                                            <label for="edit_apellido_p"
                                                                                class="form-label">Apellido Paterno</label>
                                                                            <input type="text"
                                                                                class="form-control @error('apellido_p') is-invalid @enderror"
                                                                                id="edit_apellido_p" name="apellido_p"
                                                                                value="{{ old('apellido_p', $usuario->apellido_p) }}"
                                                                                required>
                                                                        </div>

                                                                        <!-- Apellido Materno -->
                                                                        <div class="mb-3">
                                                                            <label for="edit_apellido_m"
                                                                                class="form-label">Apellido Materno</label>
                                                                            <input type="text"
                                                                                class="form-control @error('apellido_m') is-invalid @enderror"
                                                                                id="edit_apellido_m" name="apellido_m"
                                                                                value="{{ old('apellido_m', $usuario->apellido_m) }}"
                                                                                required>
                                                                        </div>

                                                                        <!-- Carnet -->
                                                                        <div class="mb-3">
                                                                            <label for="edit_carnet"
                                                                                class="form-label">Carnet</label>
                                                                            <input type="text"
                                                                                class="form-control @error('carnet') is-invalid @enderror"
                                                                                id="edit_carnet" name="carnet"
                                                                                value="{{ old('carnet', $usuario->carnet) }}"
                                                                                required>
                                                                        </div>

                                                                        <!-- Fecha de Nacimiento -->
                                                                        <div class="mb-3">
                                                                            <label for="edit_fecha_nac"
                                                                                class="form-label">Fecha de
                                                                                Nacimiento</label>
                                                                            <input type="date" class="form-control"
                                                                                id="edit_fecha_nac" name="fecha_nac"
                                                                                value="{{ old('fecha_nac', $usuario->fecha_nac) }}"
                                                                                required>
                                                                        </div>

                                                                        <!-- Correo -->
                                                                        <div class="mb-3">
                                                                            <label for="edit_correo"
                                                                                class="form-label">Correo</label>
                                                                            <input type="email"
                                                                                class="form-control @error('correo') is-invalid @enderror"
                                                                                id="edit_correo" name="correo"
                                                                                value="{{ old('correo', $usuario->correo) }}"
                                                                                required>
                                                                        </div>

                                                                        <!-- Teléfono -->
                                                                        <div class="mb-3">
                                                                            <label for="edit_telefono"
                                                                                class="form-label">Teléfono</label>
                                                                            <input type="tel" class="form-control"
                                                                                id="edit_telefono" name="telefono"
                                                                                value="{{ old('telefono', $usuario->telefono) }}"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Actualizar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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
        </div>
    </section>
@endsection
