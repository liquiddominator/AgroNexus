@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Registro de Insumo en Lote</h1>
    <p><strong>ID:</strong> {{ $loteinsumo->loteinsumoid }}</p>
    <p><strong>Lote:</strong> {{ $loteinsumo->lote->nombre }}</p>
    <p><strong>Insumo:</strong> {{ $loteinsumo->insumo->nombre }}</p>
    <p><strong>Usuario:</strong> {{ $loteinsumo->usuario->nombre }} {{ $loteinsumo->usuario->apellido }}</p>
    <p><strong>Cantidad Usada:</strong> {{ $loteinsumo->cantidadusada }}</p>
    <p><strong>Fecha Uso:</strong> {{ $loteinsumo->fechauso }}</p>
    <p><strong>Costo Total:</strong> {{ $loteinsumo->costototal }}</p>
    <p><strong>Estado:</strong> {{ $loteinsumo->estado }}</p>
    <p><strong>Observaciones:</strong> {{ $loteinsumo->observaciones }}</p>

    <a href="{{ route('loteinsumos.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection