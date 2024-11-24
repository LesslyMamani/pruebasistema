@extends('dashboard.app')

@section('content')
    <div>
        <h4>Inscripciones</h4>
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
                                    <h3 class="nftmax-table__title mb-0">TABLA INSCRIPCIONES</h3>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInscripcionModal">
                                        Crear Inscripción
                                    </button>
                                </div>
        
                                <div class="table-responsive mt-3">
                                    <table id="nftmax-table__main" class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Usuario</th>
                                                <th>Curso</th>
                                                <th>Rol del usuario</th>
                                                <th>Fecha Inscripción</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inscripciones as $ins)
                                                <tr>
                                                    <td>{{ $ins->id_inscripcion }}</td>
                                                    <td>{{ $ins->usuario->nombre }} {{ $ins->usuario->apellido_p }} {{ $ins->usuario->apellido_m }}</td>
                                                    <td>{{ $ins->curso->nombre }}</td>
                                                    <td>{{ $ins->usuario->nombre_rol }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($ins->fecha_inscripcion)->format('d/m/Y') }}</td>
                                                    <td>
                                                        <span class="badge {{ $ins->estado == 'Inscrito' ? 'bg-primary' : ($ins->estado == 'Completado' ? 'bg-success' : 'bg-danger') }}">
                                                            {{ $ins->estado }}
                                                        </span>
                                                    </td>
                                                   {{--  <td class="d-flex gap-2">
                                                        <!-- Botón para editar inscripción -->
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editInscripcionModal{{ $ins->id_inscripcion }}">
                                                            Editar
                                                        </button>
        
                                                        <!-- Botón para eliminar inscripción -->
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteInscripcionModal" data-id="{{ $ins->id_inscripcion }}">
                                                            Eliminar
                                                        </button>
                                                    </td> --}}
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

    <!-- Modal para Crear Inscripción -->
    @include('inscripciones.create')

    <!-- Modal para Editar Inscripción -->
    @include('inscripciones.edit')

    <!-- Modal para Confirmación de Eliminación -->
    <div class="modal fade" id="deleteInscripcionModal" tabindex="-1" aria-labelledby="deleteInscripcionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteInscripcionModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de eliminar esta inscripción?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="" onsubmit="return confirm('¿Estás seguro de eliminar esta inscripción?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para asignar el ID de la inscripción a eliminar en el modal -->
    <script>
        const deleteModal = document.getElementById('deleteInscripcionModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Botón que activó el modal
            const inscripcionId = button.getAttribute('data-id'); // Obtener el ID de la inscripción
            const form = deleteModal.querySelector('#deleteForm');
            form.action = '/inscripciones/' + inscripcionId; // Asignar la acción del formulario con el ID de la inscripción
        });
    </script>
@endsection
