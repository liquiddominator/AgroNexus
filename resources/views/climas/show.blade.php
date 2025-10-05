@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Registro Climático</h1>
    <p><strong>ID:</strong> {{ $clima->climaid }}</p>
    <p><strong>Lote:</strong> {{ $clima->lote->nombre }}</p>
    <p><strong>Fecha:</strong> {{ $clima->fecha }}</p>
    <p><strong>Temperatura:</strong> {{ $clima->temperatura }} °C</p>
    <p><strong>Humedad:</strong> {{ $clima->humedad }} %</p>
    <p><strong>Lluvia:</strong> {{ $clima->lluvia }} mm</p>
    <p><strong>Observaciones:</strong> {{ $clima->observaciones }}</p>

    <a href="{{ route('climas.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection