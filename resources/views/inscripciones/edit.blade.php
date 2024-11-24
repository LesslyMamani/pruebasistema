{{-- @foreach ($inscripciones as $insc)
    <div class="modal fade" id="editInscripcionModal{{ $insc->id_inscripcion }}" tabindex="-1" aria-labelledby="editInscripcionModalLabel{{ $insc->id_inscripcion }}" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('inscripciones.update', $insc->id_inscripcion) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editInscripcionModalLabel{{ $insc->id_inscripcion }}">Editar Inscripción</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="id_usuario" class="form-label">Usuario</label>
                            <select class="form-select" id="id_usuario" name="id_usuario" required>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id_usuario }}" {{ $insc->id_usuario == $usuario->id_usuario ? 'selected' : '' }}>
                                        {{ $usuario->nombre }} {{ $usuario->apellido_p }} {{ $usuario->apellido_m }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_curso" class="form-label">Curso</label>
                            <select class="form-select" id="id_curso" name="id_curso" required>
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id_curso }}" {{ $insc->id_curso == $curso->id_curso ? 'selected' : '' }}>
                                        {{ $curso->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_inscripcion" class="form-label">Fecha de Inscripción</label>
                            <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" value="{{ $insc->fecha_inscripcion }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="Inscrito" {{ $insc->estado == 'Inscrito' ? 'selected' : '' }}>Inscrito</option>
                                <option value="Completado" {{ $insc->estado == 'Completado' ? 'selected' : '' }}>Completado</option>
                                <option value="Cancelado" {{ $insc->estado == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
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
 --}}