<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="apellido_p" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellido_p" name="apellido_p" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="apellido_m" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellido_m" name="apellido_m" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="carnet" class="form-label">Carnet</label>
                                <input type="number" class="form-control" id="carnet" name="carnet" required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="expedido" class="form-label">Expedido</label>
                                <select class="form-select" id="expedido" name="expedido" required>
                                    <option value="BN">BN</option>
                                    <option value="CH">CH</option>
                                    <option value="CB">CB</option>
                                    <option value="LP">LP</option>
                                    <option value="OR">OR</option>
                                    <option value="PA">PA</option>
                                    <option value="PT">PT</option>
                                    <option value="SC">SC</option>
                                    <option value="TJ">TJ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha_nac" class="form-label">Fecha Nac</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre_rol" class="form-label">Rol</label>
                                <select class="form-select" id="nombre_rol" name="nombre_rol" required>
                                    <option value="Usuario">Usuario</option>
                                    <option value="Expositor">Expositor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre_area" class="form-label">Área</label>
                                <select class="form-select" id="nombre_area" name="nombre_area" required>
                                    <option value="Docente">Docente</option>
                                    <option value="Administrativo">Administrativo</option>
                                    <option value="Externo">Externo</option>
                                    <option value="Estudiante">Estudiante</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        // Verificar si hay un mensaje de éxito o error desde la sesión
        @if (session('success'))
            document.getElementById('resultMessage').innerText = "{{ session('success') }}";
            $('#resultModal').modal('show');
        @elseif (session('error'))
            document.getElementById('resultMessage').innerText = "{{ session('error') }}";
            $('#resultModal').modal('show');
        @endif

        // Escuchar el evento de cierre del modal para limpiar los campos
        document.getElementById('createUserModal').addEventListener('hidden.bs.modal', function() {
            // Obtener todos los campos del formulario dentro del modal
            const form = this.querySelector('form');
            form.reset(); // Reinicia todos los campos del formulario
        });

        // Opcional: limpiar también al abrir, si es necesario
        document.getElementById('createUserModal').addEventListener('shown.bs.modal', function() {
            // Si necesitas limpiar campos adicionales o hacer otra lógica, agrégalo aquí
        });
    </script>
@endpush
