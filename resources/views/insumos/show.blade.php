@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Insumo</h1>
    <p><strong>ID:</strong> {{ $insumo->insumoid }}</p>
    <p><strong>Nombre:</strong> {{ $insumo->nombre }}</p>
    <p><strong>Tipo:</strong> {{ $insumo->tipo }}</p>
    <p><strong>Unidad:</strong> {{ $insumo->unidad }}</p>
    <p><strong>Stock:</strong> {{ $insumo->stock }}</p>
    <p><strong>Stock Mínimo:</strong> {{ $insumo->stockminimo }}</p>
    <p><strong>Proveedor:</strong> {{ $insumo->proveedor }}</p>
    <p><strong>Precio Unitario:</strong> {{ $insumo->preciounitario }}</p>
    <p><strong>Descripción:</strong> {{ $insumo->descripcion }}</p>

    <a href="{{ route('insumos.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection