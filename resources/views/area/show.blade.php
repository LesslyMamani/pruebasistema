@extends('dashboard.app')

@section('content')
    <h1>Área: {{ $area->nombre }}</h1>
    <p>ID: {{ $area->id }}</p>
    <!-- Puedes agregar más detalles aquí si es necesario -->
@endsection
