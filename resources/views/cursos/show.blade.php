@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Detalles del Curso</h4>
                </div>
                <div class="card-body">
                    <!-- Nombre del curso -->
                    <h5 class="card-title">Nombre: {{ $curso->nombre }}</h5>

                    <!-- ID del curso -->
                    <p><strong>ID:</strong> {{ $curso->id_curso }}</p>

                    <!-- Descripción -->
                    <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>

                    <!-- Duración -->
                    <p><strong>Duración:</strong> {{ $curso->duracion }} horas</p>

                    <!-- Fechas de inicio y fin -->
                    <p><strong>Fecha de Inicio:</strong> {{ $curso->fecha_inicio }}</p>
                    <p><strong>Fecha de Fin:</strong> {{ $curso->fecha_fin }}</p>
                    <p><strong>Estado:</strong> {{ $curso->estado }}</p>


                    <!-- Botón para regresar al índice -->
                    <a href="{{ route('curso.index') }}" class="btn btn-secondary">Volver a la lista de cursos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
