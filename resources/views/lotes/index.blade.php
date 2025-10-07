@extends('layouts.app')

@section('title', 'Gestión de Lotes')

@section('content')
<!-- Breadcrumb -->
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item">Gestión de Lotes</li>
                <li class="breadcrumb-item active">Lista de Lotes</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Header -->
<div class="row mb-4">
    <div class="col-12">
        <h2><i class="fas fa-map"></i> Gestión de Lotes</h2>
    </div>
</div>

<!-- Estadísticas -->
<div class="row mb-4">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{ $totalLotes ?? $lotes->count() }}</h3>
                <p>Total de Lotes</p>
            </div>
            <div class="icon">
                <i class="fas fa-map-marked-alt"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $lotesActivos ?? 0 }}</h3>
                <p>Lotes Activos</p>
            </div>
            <div class="icon">
                <i class="fas fa-seedling"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $listosParaCosecha ?? 0 }}</h3>
                <p>Listos para Cosecha</p>
            </div>
            <div class="icon">
                <i class="fas fa-cut"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $enPreparacion ?? 0 }}</h3>
                <p>En Preparación</p>
            </div>
            <div class="icon">
                <i class="fas fa-cog"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filtros -->
<div class="card mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0"><i class="fas fa-filter"></i> Filtros y Búsqueda</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('lotes.index') }}">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre">Buscar Lote:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                               placeholder="Nombre del lote..." value="{{ request('nombre') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cultivo">Tipo de Cultivo:</label>
                        <select class="form-control" id="cultivo" name="cultivo">
                            <option value="">Seleccionar...</option>
                            @foreach($cultivos ?? [] as $cultivo)
                                <option value="{{ $cultivo }}" {{ request('cultivo') == $cultivo ? 'selected' : '' }}>
                                    {{ $cultivo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="estado">Estado del Lote:</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value="">Seleccionar...</option>
                            <option value="En Preparación" {{ request('estado') == 'En Preparación' ? 'selected' : '' }}>En Preparación</option>
                            <option value="En Crecimiento" {{ request('estado') == 'En Crecimiento' ? 'selected' : '' }}>En Crecimiento</option>
                            <option value="Listo para Cosecha" {{ request('estado') == 'Listo para Cosecha' ? 'selected' : '' }}>Listo para Cosecha</option>
                            <option value="En Descanso" {{ request('estado') == 'En Descanso' ? 'selected' : '' }}>En Descanso</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="agricultor">Agricultor:</label>
                        <select class="form-control" id="agricultor" name="agricultor">
                            <option value="">Seleccionar...</option>
                            @foreach($agricultores ?? [] as $agri)
                                <option value="{{ $agri->usuarioid }}" {{ request('agricultor') == $agri->usuarioid ? 'selected' : '' }}>
                                    {{ $agri->nombre }} {{ $agri->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Rango de Fecha de Siembra:</label>
                    <div class="input-group">
                        <input type="date" class="form-control" name="fecha_desde" value="{{ request('fecha_desde') }}">
                        <div class="input-group-append input-group-prepend">
                            <span class="input-group-text">hasta</span>
                        </div>
                        <input type="date" class="form-control" name="fecha_hasta" value="{{ request('fecha_hasta') }}">
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-group mb-0 ml-auto">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-search"></i> Filtrar
                        </button>
                        <a href="{{ route('lotes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Limpiar
                        </a>
                        <a href="{{ route('lotes.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Lote
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabla de Lotes -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-list"></i> Lista de Lotes</h5>
        <div>
            <button class="btn btn-sm btn-success"><i class="fas fa-file-excel"></i> Excel</button>
            <button class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i> PDF</button>
            <button class="btn btn-sm btn-info"><i class="fas fa-print"></i> Imprimir</button>
        </div>
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
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre del Lote</th>
                        <th>Agricultor</th>
                        <th>Ubicación</th>
                        <th>Superficie</th>
                        <th>Cultivo</th>
                        <th>Estado Actual</th>
                        <th>Fecha Siembra</th>
                        <th>Última Producción</th>
                        <th width="120">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lotes as $lote)
                    <tr>
                        <td>
                            <img src="{{ $lote->imagenurl ?? 'https://via.placeholder.com/80x60?text=Lote' }}" 
                                 class="img-thumbnail" width="80" height="60">
                        </td>
                        <td>
                            <strong>{{ $lote->nombre }}</strong><br>
                            <small class="text-muted">ID: {{ $lote->codigo ?? 'LOT-' . str_pad($lote->loteid, 3, '0', STR_PAD_LEFT) }}</small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $lote->usuario->imagenurl ?? 'https://ui-avatars.com/api/?name=' . urlencode($lote->usuario->nombre) }}" 
                                     class="img-circle mr-2" width="30" height="30">
                                <div>
                                    <small>{{ $lote->usuario->nombre }} {{ $lote->usuario->apellido }}</small><br>
                                    <small class="text-muted">{{ $lote->usuario->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <i class="fas fa-map-marker-alt text-danger"></i> {{ $lote->ubicacion ?? 'N/A' }}<br>
                            @if($lote->latitud && $lote->longitud)
                                <small class="text-muted">{{ number_format($lote->latitud, 4) }}, {{ number_format($lote->longitud, 4) }}</small>
                            @endif
                        </td>
                        <td><strong>{{ number_format($lote->superficie, 2) }}</strong> Ha</td>
                        <td>
                            <span class="badge badge-success">{{ $lote->cultivo }}</span>
                        </td>
                        <td>
                            @php
                                $estadoNombre = $lote->estadoActualCatalogo->nombre ?? 'Sin Estado';
                                $badgeClass = 'secondary';
                                if($estadoNombre == 'Listo para Cosecha') $badgeClass = 'warning';
                                elseif($estadoNombre == 'En Crecimiento') $badgeClass = 'success';
                                elseif($estadoNombre == 'En Preparación') $badgeClass = 'info';
                                elseif($estadoNombre == 'En Descanso') $badgeClass = 'secondary';
                            @endphp
                            <span class="badge badge-{{ $badgeClass }}">{{ $estadoNombre }}</span>
                        </td>
                        <td>
                            @if($lote->fechasiembra)
                                {{ \Carbon\Carbon::parse($lote->fechasiembra)->format('d/m/Y') }}<br>
                                <small class="text-muted">hace {{ \Carbon\Carbon::parse($lote->fechasiembra)->diffForHumans() }}</small>
                            @else
                                <small class="text-muted">Sin siembra</small>
                            @endif
                        </td>
                        <td>
                            @if($lote->producciones->count() > 0)
                                <strong>{{ number_format($lote->producciones->last()->cantidad, 0) }} kg</strong><br>
                                <small class="text-muted">{{ $lote->producciones->last()->created_at->format('d/m/Y') }}</small>
                            @else
                                <small class="text-muted">-</small>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group-vertical btn-group-sm" role="group">
                                <button type="button" class="btn btn-info btn-sm" title="Ver detalles" 
                                        onclick="verDetalles({{ $lote->loteid }})">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="{{ route('lotes.edit', $lote->loteid) }}" 
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" title="Eliminar"
                                        onclick="eliminarLote({{ $lote->loteid }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            <div class="py-4">
                                <i class="fas fa-map-marked-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No se encontraron lotes</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($lotes, 'links'))
        <div class="mt-3">
            {{ $lotes->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Modal Detalles Lote -->
<div class="modal fade" id="modalDetalles" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detalles del Lote</h5>
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

<!-- Modal Confirmar Eliminar -->
<div class="modal fade" id="modalConfirmarEliminar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Confirmar Eliminación</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="formEliminar" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Está seguro de que desea eliminar este lote?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-info-circle"></i> Esta acción eliminará también todos los registros asociados (actividades, producciones, etc.).
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
function verDetalles(id) {
    $('#modalDetalles').modal('show');
    $('#contenidoDetalles').html('<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x"></i><p>Cargando...</p></div>');
    
    $.get(`{{ url('lotes') }}/${id}`, function(data) {
        $('#contenidoDetalles').html(data);
    }).fail(function() {
        $('#contenidoDetalles').html('<div class="alert alert-danger">Error al cargar los datos</div>');
    });
}

function eliminarLote(id) {
    $('#formEliminar').attr('action', `{{ url('lotes') }}/${id}`);
    $('#modalConfirmarEliminar').modal('show');
}

setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 5000);
</script>
@endsection