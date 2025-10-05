@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Venta</h1>
    <p><strong>ID:</strong> {{ $venta->ventaid }}</p>
    <p><strong>Producción:</strong> {{ $venta->produccion->lote->nombre ?? 'N/A' }}</p>
    <p><strong>Cliente:</strong> {{ $venta->cliente }}</p>
    <p><strong>Cantidad:</strong> {{ $venta->cantidadkg }} kg</p>
    <p><strong>Precio/kg:</strong> {{ $venta->preciokg }}</p>
    <p><strong>Total:</strong> {{ $venta->total }}</p>
    <p><strong>Fecha Venta:</strong> {{ $venta->fechaventa }}</p>
    <p><strong>Observaciones:</strong> {{ $venta->observaciones }}</p>

    <a href="{{ route('ventas.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection