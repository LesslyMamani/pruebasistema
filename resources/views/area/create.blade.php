@extends('dashboard.app')


@section('content')
<!-- Formulario para crear área -->
<form method="POST" action="{{ route('area.store') }}">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Área</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>

        <!-- Mostrar el mensaje de error si la validación falla -->
        @error('nombre')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Crear Área</button>
</form>
@endsection
