@extends('dashboard.app')
<style>
    .nftmax-dsinner {
        width: 75vw;
        height: 100vh;
    }
</style>
@section('content')
    <section class="nftmax-adashboard nftmax-show">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-12 nftmax-main__column">
                    <div class="nftmax-body">
                        <div class="nftmax-dsinner">
                            <div class="nftmax-table mg-top-100">
                                <div class="nftmax-table__heading">
                                    <h3 class="nftmax-table__title mb-0">Listado de Expositores</h3>
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
                                                    <th class="nftmax-table__column-3 nftmax-table__h3">Apellido Paterno</th>
                                                    <th class="nftmax-table__column-4 nftmax-table__h4">Apellido Materno</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h5">Carnet</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h6">Expedido</th>
                                                    <th class="nftmax-table__column-6 nftmax-table__h2">Fecha Nacimiento</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h2">Telefono</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h2">Rol</th>
                                                    <th class="nftmax-table__column-5 nftmax-table__h2">Area</th>
                                                </tr>
                                            </thead>
                                            <tbody class="nftmax-table__body">
                                                @foreach ($usuarios as $usuario)
                                                    <tr>
                                                        <td class="nftmax-table__column-1 nftmax-table__data-1">
                                                            {{ $usuario->id_usuario }}</td>
                                                        <td class="nftmax-table__column-2 nftmax-table__data-2">
                                                            {{ $usuario->nombre }}</td>
                                                        <td class="nftmax-table__column-3 nftmax-table__data-3">
                                                            {{ $usuario->apellido_p }}</td>
                                                        <td class="nftmax-table__column-4 nftmax-table__data-4">
                                                            {{ $usuario->apellido_m }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-5">
                                                            {{ $usuario->carnet }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-6">
                                                                {{ $usuario->expedido }}</td>
                                                        <td class="nftmax-table__column-6 nftmax-table__data-6">
                                                            {{ $usuario->fecha_nac }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-8">
                                                            {{ $usuario->telefono }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-9">
                                                            {{ $usuario->nombre_rol }}</td>
                                                        <td class="nftmax-table__column-5 nftmax-table__data-9">
                                                            {{ $usuario->nombre_area }}</td>
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
@endsection
