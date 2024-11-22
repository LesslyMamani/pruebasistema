@extends('dashboard.app')
<style>
    .nftmax-dsinner {
        width: 75vw;
        /* 100% del ancho de la ventana del navegador */
        height: 100vh;
        /* 100% de la altura de la ventana del navegador */
    }
</style>

@section('content')
    <section class="nftmax-adashboard nftmax-show">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-12 nftmax-main__column">
                    <div class="nftmax-body">
                        <!-- Dashboard Inner -->
                        <div class="nftmax-dsinner">
                            <div class="nftmax-table mg-top-100">
                                <div class="nftmax-table__heading">
                                    <h3 class="nftmax-table__title mb-0">Listado de Cursos</h3>
                                    <!-- Botón para abrir modal -->
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#crearCursoModal">Crear Nuevo Curso</button>
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
                                                    <th class="nftmax-table__column-3 nftmax-table__h3">Área</th>
                                                    <th class="nftmax-table__column-4 nftmax-table__h4">Duración (hrs)</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h5">Fecha Inicio</th>
                                                    <th class="nftmax-table__column-6 nftmax-table__h6">Fecha Fin</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h7">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="nftmax-table__body">
                                                @foreach ($cursos as $curso)
                                                    <tr>
                                                        <td class="nftmax-table__column-1 nftmax-table__data-1">
                                                            {{ $curso->id_curso }}</td>
                                                        <td class="nftmax-table__column-2 nftmax-table__data-2">
                                                            {{ $curso->nombre }}</td>
                                                        <td class="nftmax-table__column-7 nftmax-table__data-7">
                                                            {{ $curso->area->nombre ?? 'No asignada' }} </td>
                                                        <td class="nftmax-table__column-3 nftmax-table__data-3">
                                                            {{ $curso->duracion }}</td>
                                                        <td class="nftmax-table__column-4 nftmax-table__data-4">
                                                            {{ $curso->fecha_inicio }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-5">
                                                            {{ $curso->fecha_fin }}</td>

                                                        <td class="nftmax-table__column-6 nftmax-table__data-6">
                                                            <!-- Acciones -->
                                                            <div class="nftmax-table__actions">
                                                                <!-- Botón Editar -->
                                                                <button class="btn btn-sm btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editarCursoModal"
                                                                    data-id="{{ $curso->id_curso }}"
                                                                    data-nombre="{{ $curso->nombre }}"
                                                                    data-duracion="{{ $curso->duracion }}"
                                                                    data-fecha_inicio="{{ $curso->fecha_inicio }}"
                                                                    data-fecha_fin="{{ $curso->fecha_fin }}"
                                                                    data-id_area="{{ $curso->id_area }}">
                                                                    <!-- Agregado id_area -->
                                                                    Editar
                                                                </button>

                                                                <!-- Botón Eliminar -->
                                                                <form
                                                                    action="{{ route('curso.destroy', $curso->id_curso) }}"
                                                                    method="POST" style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</button>
                                                                </form>
                                                            </div>

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
        </div>
    </section>

    <!-- Modal Crear Curso -->
    <div class="modal fade" id="crearCursoModal" tabindex="-1" aria-labelledby="crearCursoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('curso.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearCursoModalLabel">Crear Nuevo Curso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="mb-3">
                        <label for="id_area" class="form-label">Área</label>
                        <select class="form-control" id="id_area" name="id_area" required>
                            <option value="" disabled selected>Seleccione un área</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Curso</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duración (hrs)</label>
                            <input type="number" class="form-control" id="duracion" name="duracion"
                                value="{{ old('duracion') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                                value="{{ old('fecha_inicio') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                                value="{{ old('fecha_fin') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Curso -->
    <div class="modal fade" id="editarCursoModal" tabindex="-1" aria-labelledby="editarCursoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarCursoModalLabel">Editar Cursoss</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarCursoForm" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre del curso -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Curso</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <!-- Selección de Área -->
                        <div class="mb-3">
                            <label for="id_area" class="form-label">Área</label>
                            <select class="form-control" id="id_area" name="id_area" required>
                                <option value="" disabled>Seleccione un área</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}"
                                        {{ old('id_area', $curso->id) == $area->id ? 'selected' : '' }}>
                                        {{ $area->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Duración -->
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duración (hrs)</label>
                            <input type="number" class="form-control" id="duracion" name="duracion" required>
                        </div>

                        <!-- Fecha de inicio -->
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                        </div>

                        <!-- Fecha de fin -->
                        <div class="mb-3">
                            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var crearCursoModal = new bootstrap.Modal(document.getElementById('crearCursoModal'));
                crearCursoModal.show();
            });
        </script>
    @endif

    <script>
        document.getElementById('editarCursoModal').addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-nombre');
            var idArea = button.getAttribute('data-id_area');
            var duracion = button.getAttribute('data-duracion');
            var fechaInicio = button.getAttribute('data-fecha_inicio');
            var fechaFin = button.getAttribute('data-fecha_fin');
            // Este es el ID del área

            var modal = this;
            modal.querySelector('#nombre').value = nombre;
            modal.querySelector('#duracion').value = duracion;
            modal.querySelector('#fecha_inicio').value = fechaInicio;
            modal.querySelector('#fecha_fin').value = fechaFin;

            // Asigna el ID del área correctamente en el select
            modal.querySelector('#id_area').value = idArea; // Establece el valor del select

            // El formulario de edición debe tener la acción correcta
            var formEditar = modal.querySelector('form');
            formEditar.action = "/curso/" + id; // Se usa la URL para la actualización
        });
    </script>
@endsection
