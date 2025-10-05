@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Lote</h1>
    <p><strong>ID:</strong> {{ $lote->loteid }}</p>
    <p><strong>Nombre:</strong> {{ $lote->nombre }}</p>
    <p><strong>Usuario:</strong> {{ $lote->usuario->nombre }} {{ $lote->usuario->apellido }}</p>
    <p><strong>Ubicación:</strong> {{ $lote->ubicacion }}</p>
    <p><strong>Superficie:</strong> {{ $lote->superficie }} ha</p>
    <p><strong>Cultivo:</strong> {{ $lote->cultivo }}</p>
    <p><strong>Fecha de Siembra:</strong> {{ $lote->fechasiembra }}</p>
    <p><strong>Estado Actual:</strong> {{ $lote->estadoactual }}</p>
    @if($lote->imagenurl)
        <p><strong>Imagen:</strong></p>
        <img src="{{ $lote->imagenurl }}" class="img-fluid" alt="Imagen del lote">
    @endif

    <a href="{{ route('lotes.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection