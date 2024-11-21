@extends('dashboard.app')

@section('content')
    <!-- Formulario para crear un curso -->
    <div class="container mt-5">
        <h2>Crear Nuevo Curso</h2>
        <form method="POST" action="{{ route('curso.store') }}">
            @csrf

            <!-- Nombre del curso -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Describe brevemente el curso">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Duración -->
            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (en horas)</label>
                <input type="number" class="form-control" id="duracion" name="duracion" value="{{ old('duracion') }}" required>
                @error('duracion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Fecha de inicio -->
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                @error('fecha_inicio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Fecha de fin -->
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" required>
                @error('fecha_fin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Selección de Área -->
            <div class="mb-3">
                <label for="id_area" class="form-label">Área</label>
                <select class="form-control" id="id_area" name="id_area" required>
                    <option value="" disabled selected>Seleccione un área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id_area }}" {{ old('id_area') == $area->id_area ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('id_area')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('curso.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Crear Curso</button>
            </div>
        </form>
    </div>
@endsection
