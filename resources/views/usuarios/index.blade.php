@extends('dashboard.app')

@section('content')
    <div>
        <h4>Usuarios</h4>
        <!-- Alertas -->
        <div class="container mt-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>   

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
                                                <th>Expedido</th>
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
                                                        <span class="badge {{ $use->estado == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $use->estado == 1 ? 'Activo' : 'Inactivo' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $use->carnet }}</td>
                                                    <td>{{ $use->expedido }}</td> <!-- Aquí se muestra el campo 'expedido' -->
                                                    <td>{{ \Carbon\Carbon::parse($use->fecha_nac)->format('d/m/Y') }}</td>
                                                    <td>{{ $use->telefono }}</td>
                                                    <td>{{ $use->nombre_rol }}</td>
                                                    <td>{{ $use->nombre_area }}</td>
                                                    <td class="d-flex gap-2">
                                                        <!-- Botón para editar usuario -->
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $use->id_usuario }}">
                                                            Editar
                                                        </button>
        
                                                        <!-- Botón para eliminar usuario -->
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-id="{{ $use->id_usuario }}">
                                                            Eliminar
                                                        </button>
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

    <!-- Modal para Confirmación de Eliminación con el estilo solicitado -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body nftmax-modal__body modal-body nftmax-close__body">
                    <div class="nftmax-preview__close">
                        <div class="nftmax-preview__close-img">
                            <img src="img/close.png" alt="#">
                        </div>
                        <h2 class="nftmax-preview__close-title">
                            ¿Estás seguro de eliminar este usuario?
                        </h2>
                        <div class="nftmax__item-button--group">
                            <form id="deleteForm" method="POST" action="" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius ">
                                    Sí, eliminar
                                </button>
                            </form>
                            <button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered--plus radius" data-bs-dismiss="modal">
                                <span class="ntfmax__btn-textgr">No, quiero continuar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para asignar el ID del usuario a eliminar en el modal -->
    <script>
        const deleteModal = document.getElementById('deleteUserModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Botón que activó el modal
            const userId = button.getAttribute('data-id'); // Obtener el ID del usuario
            const form = deleteModal.querySelector('#deleteForm');
            form.action = '/usuarios/' + userId; // Asignar la acción del formulario con el ID del usuario
        });
    </script>
@endsection
