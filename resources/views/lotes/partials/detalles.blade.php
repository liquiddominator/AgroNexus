<!-- Información General del Lote -->
<div class="row mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Información General - {{ $lote->nombre }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="140"><strong>Nombre del Lote:</strong></td>
                                <td>{{ $lote->nombre }}</td>
                            </tr>
                            <tr>
                                <td><strong>Propietario:</strong></td>
                                <td>{{ $lote->usuario->nombre }} {{ $lote->usuario->apellido }}</td>
                            </tr>
                            <tr>
                                <td><strong>Ubicación:</strong></td>
                                <td>{{ $lote->ubicacion ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Coordenadas:</strong></td>
                                <td>
                                    @if($lote->latitud && $lote->longitud)
                                        {{ number_format($lote->latitud, 6) }}, {{ number_format($lote->longitud, 6) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="140"><strong>Superficie:</strong></td>
                                <td>{{ number_format($lote->superficie, 2) }} hectáreas</td>
                            </tr>
                            <tr>
                                <td><strong>Tipo de Cultivo:</strong></td>
                                <td><span class="badge badge-success">{{ $lote->cultivo }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Fecha de Siembra:</strong></td>
                                <td>{{ $lote->fechasiembra ? $lote->fechasiembra->format('d/m/Y') : 'Sin siembra' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Estado Actual:</strong></td>
                                <td>
                                    @php
                                        $estadoNombre = $lote->estadoActual->nombre ?? 'Sin Estado';
                                        $badgeClass = 'secondary';
                                        if($estadoNombre == 'Listo para Cosecha') $badgeClass = 'warning';
                                        elseif($estadoNombre == 'En Crecimiento') $badgeClass = 'success';
                                        elseif($estadoNombre == 'En Preparación') $badgeClass = 'info';
                                    @endphp
                                    <span class="badge badge-{{ $badgeClass }}">{{ $estadoNombre }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Fecha de Creación:</strong></td>
                                <td>{{ $lote->fechacreacion ? $lote->fechacreacion->format('d/m/Y') : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Última Modificación:</strong></td>
                                <td>{{ $lote->fechamodificacion ? $lote->fechamodificacion->diffForHumans() : 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-light">
                <h6 class="mb-0"><i class="fas fa-image"></i> Imagen del Lote</h6>
            </div>
            <div class="card-body text-center">
                <img src="{{ $lote->imagenurl ?? 'https://via.placeholder.com/300x200?text=Sin+Imagen' }}" 
                     class="img-fluid rounded" alt="{{ $lote->nombre }}">
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas del Lote -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-leaf"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">KG Cosechados</span>
                <span class="info-box-number">{{ number_format($lote->producciones->sum('cantidad'), 0) }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-calendar-check"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Días Cultivando</span>
                <span class="info-box-number">
                    {{ $lote->fechasiembra ? $lote->fechasiembra->diffInDays(now()) : 0 }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-tasks"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Actividades</span>
                <span class="info-box-number">{{ $lote->actividades->count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Valor Generado</span>
                <span class="info-box-number">${{ number_format($lote->producciones->sum('valor') ?? 0, 2) }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Botones de acción -->
<div class="text-right">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <i class="fas fa-times"></i> Cerrar
    </button>
    <a href="{{ route('lotes.edit', $lote->loteid) }}" class="btn btn-warning">
        <i class="fas fa-edit"></i> Editar Lote
    </a>
</div>