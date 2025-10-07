{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Encabezado -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="font-weight-bold">Dashboard Principal</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Tarjetas de Estadísticas -->
    <div class="row mb-4">
        <!-- Lotes Activos -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">{{ $totalLotes }}</h3>
                            <p class="mb-0">Lotes Activos</p>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-map fa-3x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('lotes.index') }}" class="btn btn-light btn-sm">
                            Ver detalles <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Producción del Mes -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">{{ number_format($produccionMes, 0) }}<small>kg</small></h3>
                            <p class="mb-0">Producción del Mes</p>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-seedling fa-3x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('producciones.index') }}" class="btn btn-light btn-sm">
                            Ver reportes <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alertas de Inventario -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">{{ $alertasInventario }}</h3>
                            <p class="mb-0">Alertas de Inventario</p>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-exclamation-triangle fa-3x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('insumos.index') }}" class="btn btn-light btn-sm">
                            Revisar inventario <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ventas del Mes -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="font-weight-bold mb-0">${{ number_format($ventasMes, 0) }}</h3>
                            <p class="mb-0">Ventas del Mes</p>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-dollar-sign fa-3x"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('ventas.index') }}" class="btn btn-light btn-sm">
                            Ver ventas <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Gráfico de Producción -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 pt-3">
                    <h5 class="mb-0"><i class="fas fa-chart-line mr-2"></i>Producción de los Últimos 6 Meses</h5>
                </div>
                <div class="card-body">
                    <canvas id="produccionChart" height="80"></canvas>
                </div>
            </div>
        </div>

        <!-- Widget de Clima -->
<div class="col-lg-4 mb-4">
    <div class="card shadow-sm border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="card-body text-white text-center">
            <div class="mb-3">
                <i class="fas fa-map-marker-alt"></i> Santa Cruz, Bolivia
            </div>
            <div class="display-3 font-weight-bold">{{ $climaData['temperatura'] }}°C</div>
            <p class="mb-3">{{ $climaData['descripcion'] }}</p>
            <div class="d-flex justify-content-around mt-4">
                <div>
                    <i class="fas fa-tint"></i> {{ $climaData['humedad'] }}% Humedad
                </div>
                <div>
                    <i class="fas fa-wind"></i> {{ $climaData['viento'] }} km/h
                </div>
            </div>
        </div>
    </div>
            <!-- Acciones Rápidas -->
            <div class="card shadow-sm border-0 mt-3">
                <div class="card-header bg-white border-0">
                    <h6 class="mb-0"><i class="fas fa-bolt mr-2"></i>Acciones Rápidas</h6>
                </div>
                <div class="card-body p-2">
                    <a href="{{ route('lotes.create') }}" class="btn btn-success btn-block mb-2">
                        <i class="fas fa-plus mr-2"></i>Nuevo Lote
                    </a>
                    <a href="{{ route('actividades.create') }}" class="btn btn-success btn-block mb-2">
                        <i class="fas fa-clipboard-list mr-2"></i>Registrar Actividad
                    </a>
                    <a href="{{ route('insumos.index') }}" class="btn btn-info btn-block mb-2">
                        <i class="fas fa-boxes mr-2"></i>Gestionar Inventario
                    </a>
                    <a href="{{ route('producciones.index') }}" class="btn btn-warning btn-block">
                        <i class="fas fa-chart-bar mr-2"></i>Ver Reportes
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Actividades Recientes -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0"><i class="fas fa-history mr-2"></i>Actividades Recientes</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($actividadesRecientes as $actividad)
                        <div class="list-group-item">
                            <div class="d-flex">
                                <div class="mr-3">
                                    @php
                                        $iconos = [
                                            'siembra' => 'fa-seedling text-success',
                                            'riego' => 'fa-tint text-info',
                                            'cosecha' => 'fa-cut text-warning',
                                            'fumigación' => 'fa-spray-can text-danger'
                                        ];
                                        $icono = $iconos[strtolower($actividad->tipoactividad)] ?? 'fa-tasks text-secondary';
                                    @endphp
                                    <div class="rounded-circle bg-light p-2">
                                        <i class="fas {{ $icono }}"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $actividad->descripcion }}</h6>
                                    <small class="text-muted">
                                        {{ $actividad->lote->nombre ?? 'Lote' }} • Por {{ $actividad->usuario->nombre ?? 'Usuario' }}
                                    </small>
                                    <br>
                                    <small class="text-muted">
                                        <i class="far fa-clock"></i> {{ $actividad->fechacreacion->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item text-center text-muted py-4">
                            <i class="fas fa-inbox fa-2x mb-2"></i>
                            <p class="mb-0">No hay actividades registradas</p>
                        </div>
                        @endforelse
                    </div>
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="{{ route('actividades.index') }}" class="text-primary">Ver todas las actividades</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alertas y Notificaciones -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0"><i class="fas fa-bell mr-2"></i>Alertas y Notificaciones</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($insumosbajos as $insumo)
                        <div class="list-group-item">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <div class="rounded-circle bg-warning p-2">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Stock Bajo: {{ $insumo->nombre }}</h6>
                                    <small class="text-muted">
                                        Quedan {{ number_format($insumo->stock, 0) }} {{ $insumo->unidad }} en inventario
                                    </small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="list-group-item">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <div class="rounded-circle bg-success p-2">
                                        <i class="fas fa-check text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Todo en orden</h6>
                                    <small class="text-muted">No hay alertas de inventario</small>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="{{ route('insumos.index') }}" class="text-primary">Ver todas las alertas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estado de Lotes y Top Cultivos -->
    <div class="row">
        <!-- Estado Actual de Lotes -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0"><i class="fas fa-chart-pie mr-2"></i>Estado Actual de Lotes</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <i class="fas fa-seedling fa-2x mb-2"></i>
                                    <h3 class="mb-0">{{ $lotesEnCrecimiento }}</h3>
                                    <small>En Crecimiento</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <i class="fas fa-cut fa-2x mb-2"></i>
                                    <h3 class="mb-0">{{ $lotesListosCosecha }}</h3>
                                    <small>Listos para Cosecha</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <i class="fas fa-tools fa-2x mb-2"></i>
                                    <h3 class="mb-0">{{ $lotesEnPreparacion }}</h3>
                                    <small>En Preparación</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <i class="fas fa-pause fa-2x mb-2"></i>
                                    <h3 class="mb-0">{{ $lotesEnDescanso }}</h3>
                                    <small>En Descanso</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Cultivos por Producción -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0"><i class="fas fa-trophy mr-2"></i>Top Cultivos por Producción</h5>
                </div>
                <div class="card-body">
                    @php
                        $colores = ['success', 'warning', 'info', 'danger'];
                        $maxProduccion = $topCultivos->max('total') ?: 1;
                    @endphp
                    @foreach($topCultivos as $index => $cultivo)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <strong>{{ $cultivo->cultivo }}</strong>
                            <span>{{ number_format($cultivo->total, 0) }} kg</span>
                        </div>
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar bg-{{ $colores[$index] }}" 
                                 role="progressbar" 
                                 style="width: {{ ($cultivo->total / $maxProduccion) * 100 }}%"
                                 aria-valuenow="{{ $cultivo->total }}" 
                                 aria-valuemin="0" 
                                 aria-valuemax="{{ $maxProduccion }}">
                                {{ number_format(($cultivo->total / $maxProduccion) * 100, 0) }}%
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
// Gráfico de producción
const ctx = document.getElementById('produccionChart');
if (ctx) {
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre'],
            datasets: [
                {
                    label: 'Soja (kg)',
                    data: [450, 520, 590, 630, 590, 590],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Maíz (kg)',
                    data: [380, 420, 450, 490, 440, 420],
                    borderColor: '#ffc107',
                    backgroundColor: 'rgba(255, 193, 7, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Trigo (kg)',
                    data: [150, 190, 170, 200, 180, 190],
                    borderColor: '#17a2b8',
                    backgroundColor: 'rgba(23, 162, 184, 0.1)',
                    tension: 0.4,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
</script>
@endsection