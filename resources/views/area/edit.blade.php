@extends('dashboard.app')

@section('content')
<form action="{{ route('area.update', $area) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre del Área</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $area->nombre) }}">
        @error('nombre')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
</form>
@endsection
