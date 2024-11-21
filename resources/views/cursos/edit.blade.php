@extends('dashboard.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Curso</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('curso.update', $curso->id_curso) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Campo Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Curso</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" value="{{ old('nombre', $curso->nombre) }}" required>
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Selección de Área -->
                            <div class="mb-3">
                                <label for="id_area" class="form-label">Área</label>
                                <input type='text' class="form-control @error('id_area') is-invalid @enderror"
                                id="id_area" name="id_area" value="{{ old('id_area', $area->nombre)}}" required>
                                @error('id_area')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Campo Duración -->
                            <div class="mb-3">
                                <label for="duracion" class="form-label">Duración (hrs)</label>
                                <input type="number" class="form-control @error('duracion') is-invalid @enderror"
                                    id="duracion" name="duracion" value="{{ old('duracion', $curso->duracion) }}" required>
                                @error('duracion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Fecha de Inicio -->
                            <div class="mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror"
                                    id="fecha_inicio" name="fecha_inicio"
                                    value="{{ old('fecha_inicio', $curso->fecha_inicio) }}" required>
                                @error('fecha_inicio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Fecha de Fin -->
                            <div class="mb-3">
                                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                                <input type="date" class="form-control @error('fecha_fin') is-invalid @enderror"
                                    id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin', $curso->fecha_fin) }}"
                                    required>
                                @error('fecha_fin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Descripción -->
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"
                                    rows="4" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Botones -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
