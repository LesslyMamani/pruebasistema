@extends('dashboard.app')
<style>
.nftmax-dsinner {
    width: 75vw; /* 100% del ancho de la ventana del navegador */
    height: 100vh; /* 100% de la altura de la ventana del navegador */
    /* Fondo blanco, puedes personalizarlo */
}

</style>


    {{-- <a href="{{ route('area.create') }}">Crear Nueva Área</a> --}}

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
                                    <h3 class="nftmax-table__title mb-0">Listado de Áreas</h3>
                                    <!-- Botón para abrir modal -->
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearAreaModal">Crear Nueva Área</button>
                                </div>

                                <!-- Tabla -->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="table_1" role="tabpanel" aria-labelledby="table_1">
                                        <table class="nftmax-table__main nftmax-table__main-v1">
                                            <thead class="nftmax-table__head">
                                                <tr>
                                                    <th class="nftmax-table__column-1 nftmax-table__h1">ID</th>
                                                    <th class="nftmax-table__column-2 nftmax-table__h2">Nombre de Área</th>
                                                    <th class="nftmax-table__column-3 nftmax-table__h3">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="nftmax-table__body">
                                                @foreach ($areas as $area)
                                                <tr>
                                                    <td class="nftmax-table__column-1 nftmax-table__data-1">{{ $area->id }}</td>
                                                    <td class="nftmax-table__column-2 nftmax-table__data-2">{{ $area->nombre }}</td>
                                                    <td class="nftmax-table__column-3 nftmax-table__data-3">
                                                        <div class="nftmax-table__actions">
                                                            <!-- Botón Editar -->
                                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editarAreaModal" data-id="{{ $area->id }}" data-nombre="{{ $area->nombre }}">Editar</button>

                                                            <!-- Botón Eliminar -->
                                                            <form action="{{ route('area.destroy', $area->id) }}" method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta área?')">Eliminar</button>
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

    <!-- Modal Crear Área -->
    <div class="modal fade" id="crearAreaModal" tabindex="-1" aria-labelledby="crearAreaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('area.store') }}" method="POST" >
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearAreaModalLabel">Crear Nueva Área</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Área</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

    <!-- Modal Editar Área -->
    <div class="modal fade" id="editarAreaModal" tabindex="-1" aria-labelledby="editarAreaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEditarArea" method="POST" action=" ">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarAreaModalLabel">Editar Área</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombreEditar" class="form-label">Nombre del Área</label>
                            <input type="text" class="form-control" id="nombreEditar" name="nombre" value="{{ old('nombre') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var crearAreaModal = new bootstrap.Modal(document.getElementById('crearAreaModal'));
            crearAreaModal.show();
        });
    </script>
@endif

    <script>
        // Llenar el formulario del modal Editar con los datos del área seleccionada
        document.getElementById('editarAreaModal').addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // El botón que activó el modal
            var id = button.getAttribute('data-id'); // ID del área
            var nombre = button.getAttribute('data-nombre'); // Nombre del área

            // Llenar el formulario con los valores obtenidos
            var modal = this;
            modal.querySelector('#nombreEditar').value = nombre;

            // Cambiar la acción del formulario para que apunte al endpoint correcto
            var formEditar = modal.querySelector('#formEditarArea');
            formEditar.action = "{{ url('area') }}/" + id; // La URL de la ruta 'area.update'
        });
    </script>


    @endsection
