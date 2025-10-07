@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<!-- Breadcrumb -->
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item">Usuarios</li>
                <li class="breadcrumb-item active">Gestión de Usuarios</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Header -->
<div class="row mb-4">
    <div class="col-12">
        <h2><i class="fas fa-users"></i> Gestión de Usuarios</h2>
    </div>
</div>

<!-- Estadísticas -->
<div class="row mb-4">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{ $totalUsuarios ?? $usuarios->count() }}</h3>
                <p>TOTAL USUARIOS</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $usuariosActivos ?? $usuarios->where('activo', true)->count() }}</h3>
                <p>USUARIOS ACTIVOS</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $administradores ?? $usuarios->filter(fn($u) => $u->roles->contains('nombre', 'Administrador'))->count() }}</h3>
                <p>ADMINISTRADORES</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $agricultores ?? $usuarios->filter(fn($u) => $u->roles->contains('nombre', 'Agricultor'))->count() }}</h3>
                <p>AGRICULTORES</p>
            </div>
            <div class="icon">
                <i class="fas fa-tractor"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filtros -->
<div class="card mb-4">
    <div class="card-body">
        <form id="filtrosForm" method="GET" action="{{ route('usuarios.index') }}">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="buscarNombre">Buscar por nombre:</label>
                        <input type="text" class="form-control" id="buscarNombre" name="nombre" 
                               placeholder="Nombre o apellido..." value="{{ request('nombre') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="filtroRol">Rol:</label>
                        <select class="form-control" id="filtroRol" name="rol">
                            <option value="">Todos los roles</option>
                            <option value="Administrador" {{ request('rol') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                            <option value="Agricultor" {{ request('rol') == 'Agricultor' ? 'selected' : '' }}>Agricultor</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="filtroEstado">Estado:</label>
                        <select class="form-control" id="filtroEstado" name="estado">
                            <option value="">Todos</option>
                            <option value="activo" {{ request('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ request('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="filtroFecha">Fecha registro:</label>
                        <input type="date" class="form-control" id="filtroFecha" name="fecha" value="{{ request('fecha') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Limpiar
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabla de Usuarios -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-list"></i> Lista de Usuarios del Sistema
        </h5>
        <a href="{{ route('usuarios.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nuevo Usuario
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tablaUsuarios">
                <thead class="thead-light">
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Roles</th>
                        <th>Estado</th>
                        <th>Último Login</th>
                        <th>Fecha Registro</th>
                        <th width="180">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $usuario->imagenurl ?? 'https://ui-avatars.com/api/?name=' . urlencode($usuario->nombre . ' ' . $usuario->apellido) . '&background=random' }}" 
                                     class="img-circle elevation-2 mr-2" width="40" height="40">
                                <div>
                                    <strong>{{ $usuario->nombre }} {{ $usuario->apellido }}</strong><br>
                                    <small class="text-muted">{{ '@' . $usuario->nombreusuario }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->telefono ?? 'N/A' }}</td>
                        <td>
                            @foreach($usuario->roles as $rol)
                                @if($rol->nombre == 'Administrador')
                                    <span class="badge badge-warning">{{ $rol->nombre }}</span>
                                @else
                                    <span class="badge badge-info">{{ $rol->nombre }}</span>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if($usuario->activo)
                                <span class="badge badge-success">Activo</span>
                            @else
                                <span class="badge badge-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <small>{{ $usuario->updated_at ? $usuario->updated_at->diffForHumans() : 'Nunca' }}</small>
                        </td>
                        <td>{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y') : 'N/A' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info btn-sm" title="Ver detalles" 
                                        onclick="verDetalles({{ $usuario->usuarioid }})">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="{{ route('usuarios.edit', $usuario->usuarioid) }}" 
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($usuario->activo)
                                <button type="button" class="btn btn-danger btn-sm" title="Desactivar"
                                        onclick="desactivarUsuario({{ $usuario->usuarioid }})">
                                    <i class="fas fa-times"></i>
                                </button>
                                @else
                                <button type="button" class="btn btn-success btn-sm" title="Activar"
                                        onclick="activarUsuario({{ $usuario->usuarioid }})">
                                    <i class="fas fa-check"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            <div class="py-4">
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No se encontraron usuarios</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($usuarios, 'links'))
        <div class="mt-3">
            {{ $usuarios->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal Detalles Usuario -->
<div class="modal fade" id="modalDetalles" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-user"></i> Detalles del Usuario</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="contenidoDetalles">
                <div class="text-center">
                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                    <p>Cargando...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirmar Desactivar -->
<div class="modal fade" id="modalConfirmarDesactivar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Confirmar Acción</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="formDesactivar" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p>¿Está seguro de que desea desactivar este usuario?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-info-circle"></i> Esta acción se puede revertir posteriormente.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-check"></i> Confirmar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
.small-box .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
}
.small-box .icon > i {
    font-size: 70px;
    position: absolute;
    right: 15px;
    top: 15px;
}
.btn-group .btn {
    border-radius: 0;
}
.btn-group .btn:first-child {
    border-top-left-radius: .25rem;
    border-bottom-left-radius: .25rem;
}
.btn-group .btn:last-child {
    border-top-right-radius: .25rem;
    border-bottom-right-radius: .25rem;
}
</style>
@endsection

@section('js')
<script>
function verDetalles(id) {
    $('#modalDetalles').modal('show');
    $('#contenidoDetalles').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i><p>Cargando...</p></div>');
    
    $.get(`{{ url('usuarios') }}/${id}`, function(data) {
        $('#contenidoDetalles').html(data);
    }).fail(function() {
        $('#contenidoDetalles').html('<div class="alert alert-danger">Error al cargar los datos</div>');
    });
}

function desactivarUsuario(id) {
    $('#formDesactivar').attr('action', `{{ url('usuarios') }}/${id}/desactivar`);
    $('#modalConfirmarDesactivar').modal('show');
}

function activarUsuario(id) {
    if(confirm('¿Desea activar este usuario?')) {
        $.ajax({
            url: `{{ url('usuarios') }}/${id}/activar`,
            method: 'PATCH',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function() {
                alert('Error al activar el usuario');
            }
        });
    }
}

setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 5000);
</script>
@endsection