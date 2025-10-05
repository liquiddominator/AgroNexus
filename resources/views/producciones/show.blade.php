@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Producción</h1>
    <p><strong>ID:</strong> {{ $produccion->produccionid }}</p>
    <p><strong>Lote:</strong> {{ $produccion->lote->nombre }}</p>
    <p><strong>Cantidad:</strong> {{ $produccion->cantidadkg }} kg</p>
    <p><strong>Fecha de Cosecha:</strong> {{ $produccion->fechacosecha }}</p>
    <p><strong>Destino:</strong> {{ $produccion->destino }}</p>
    @if($produccion->imagenurl)
        <p><strong>Imagen:</strong></p>
        <img src="{{ $produccion->imagenurl }}" class="img-fluid" alt="Imagen Producción">
    @endif
    <p><strong>Observaciones:</strong> {{ $produccion->observaciones }}</p>

    <a href="{{ route('producciones.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection