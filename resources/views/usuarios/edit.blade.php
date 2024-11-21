@foreach ($usuarios as $use)
        <div class="modal fade" id="editUserModal{{ $use->id_usuario }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $use->id_usuario }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('usuarios.update', $use->id_usuario) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel{{ $use->id_usuario }}">Editar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido_p" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellido_p" name="apellido_p" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido_m" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellido_m" name="apellido_m" required>
                            </div>
                            <div class="mb-3">
                                <label for="ative" class="form-label">Estado</label>
                                <input type="number" class="form-control" id="ative" name="ative" required>
                            </div>
                            <div class="mb-3">
                                <label for="carnet" class="form-label">Carnet</label>
                                <input type="number" class="form-control" id="carnet" name="carnet" required>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_nac" class="form-label">Fecha Nac</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_rol" class="form-label">Rol</label>
                                <select class="form-select" id="nombre_rol" name="nombre_rol" required>
                                    <option value="Admin" {{ $use->nombre_rol == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Usuario" {{ $use->nombre_rol == 'Usuario' ? 'selected' : '' }}>Usuario</option>
                                    <option value="Expositor" {{ $use->nombre_rol == 'Expositor' ? 'selected' : '' }}>Expositor</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_area" class="form-label">Área</label>
                                <select class="form-select" id="nombre_area" name="nombre_area" required>
                                    <option value="Docente" {{ $use->nombre_area == 'Docente' ? 'selected' : '' }}>Docente</option>
                                    <option value="Administrativo" {{ $use->nombre_area == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                                    <option value="Externo" {{ $use->nombre_area == 'Externo' ? 'selected' : '' }}>Externo</option>
                                    <option value="Estudiante" {{ $use->nombre_area == 'Estudiante' ? 'selected' : '' }}>Estudiante</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach