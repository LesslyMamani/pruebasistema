@extends('dashboard.app')
<style>
    .nftmax-dsinner {
        width: 75vw;
        /* 100% del ancho de la ventana del navegador */
        height: 100vh;
        /* 100% de la altura de la ventana del navegador */
        /* Fondo blanco, puedes personalizarlo */
    }
</style>
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
                                                    <th class="nftmax-table__column-5 nftmax-table__h5">Expedido</th>
                                                    <th class="nftmax-table__column-6 nftmax-table__h6">Fecha Nacimiento
                                                    </th>
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
                                                                {{ $usuario->expedido }}</td>
                                                        <td class="nftmax-table__column-6 nftmax-table__data-6">
                                                            {{ $usuario->fecha_nac }}</td>

                                                        <td class="nftmax-table__column-5 nftmax-table__data-8">
                                                            {{ $usuario->telefono }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-9">
                                                        </td>
                                                    </tr>

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
                                                                        <!--expedido-->
                                                                        <div class="mb-3">
                                                                            <label for="edit_expedido"
                                                                                class="form-label">Expedido</label>
                                                                            <input type="text"
                                                                                class="form-control @error('expedido') is-invalid @enderror"
                                                                                id="edit_expedido" name="expedido"
                                                                                value="{{ old('expedido', $usuario->expedido) }}"
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
