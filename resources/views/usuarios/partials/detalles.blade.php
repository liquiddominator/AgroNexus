<!-- Información del Usuario -->
<div class="row mb-4">
    <div class="col-md-4 text-center">
        <img src="{{ $usuario->imagenurl ?? 'https://ui-avatars.com/api/?name=' . urlencode($usuario->nombre . ' ' . $usuario->apellido) . '&background=random&size=150' }}" 
             class="img-circle elevation-2 mb-3" width="150" height="150">
        @if($usuario->activo)
            <span class="badge badge-success d-block">Activo</span>
        @else
            <span class="badge badge-secondary d-block">Inactivo</span>
        @endif
    </div>
    <div class="col-md-8">
        <h4 class="mb-3">{{ $usuario->nombre }} {{ $usuario->apellido }}</h4>
        <table class="table table-sm table-borderless">
            <tr>
                <td width="140"><strong>Usuario:</strong></td>
                <td>{{ '@' . $usuario->nombreusuario }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $usuario->email }}</td>
            </tr>
            <tr>
                <td><strong>Teléfono:</strong></td>
                <td>{{ $usuario->telefono ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Roles:</strong></td>
                <td>
                    @foreach($usuario->roles as $rol)
                        @if($rol->nombre == 'Administrador')
                            <span class="badge badge-warning">{{ $rol->nombre }}</span>
                        @else
                            <span class="badge badge-info">{{ $rol->nombre }}</span>
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td><strong>Fecha Registro:</strong></td>
                <td>{{ $usuario->created_at ? $usuario->created_at->format('d \d\e F, Y') : 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Último Login:</strong></td>
                <td>{{ $usuario->updated_at ? $usuario->updated_at->diffForHumans() : 'Nunca' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="mt-3 text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <i class="fas fa-times"></i> Cerrar
    </button>
    <a href="{{ route('usuarios.edit', $usuario->usuarioid) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Editar Usuario
    </a>
</div>