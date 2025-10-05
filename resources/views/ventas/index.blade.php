@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Nueva Venta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producción</th>
                <th>Cliente</th>
                <th>Cantidad (kg)</th>
                <th>Precio/kg</th>
                <th>Total</th>
                <th>Fecha Venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta->ventaid }}</td>
                <td>{{ $venta->produccion->lote->nombre ?? 'N/A' }}</td>
                <td>{{ $venta->cliente }}</td>
                <td>{{ $venta->cantidadkg }}</td>
                <td>{{ $venta->preciokg }}</td>
                <td>{{ $venta->total }}</td>
                <td>{{ $venta->fechaventa }}</td>
                <td>
                    <a href="{{ route('ventas.show', $venta->ventaid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('ventas.edit', $venta->ventaid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('ventas.destroy', $venta->ventaid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar venta?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection