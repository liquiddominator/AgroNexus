@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Estado de Lote</h1>
    <p><strong>ID:</strong> {{ $estado->estadoid }}</p>
    <p><strong>Lote:</strong> {{ $estado->lote->nombre }}</p>
    <p><strong>Estado:</strong> {{ $estado->estado }}</p>
    <p><strong>Fecha Registro:</strong> {{ $estado->fecharegistro }}</p>
    <p><strong>Observaciones:</strong> {{ $estado->observaciones }}</p>
    @if($estado->imagenurl)
        <p><strong>Imagen:</strong></p>
        <img src="{{ $estado->imagenurl }}" class="img-fluid" alt="Imagen Estado">
    @endif

    <a href="{{ route('estadolotes.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection