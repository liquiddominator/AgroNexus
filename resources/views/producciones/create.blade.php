@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Producción</h1>
    <form action="{{ route('producciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="loteid">Lote</label>
            <select name="loteid" class="form-control">
                @foreach($lotes as $lote)
                    <option value="{{ $lote->loteid }}">{{ $lote->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidadkg">Cantidad (kg)</label>
            <input type="number" step="0.01" name="cantidadkg" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fechacosecha">Fecha de Cosecha</label>
            <input type="date" name="fechacosecha" class="form-control">
        </div>
        <div class="mb-3">
            <label for="destino">Destino</label>
            <input type="text" name="destino" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imagenurl">Imagen (URL)</label>
            <input type="text" name="imagenurl" class="form-control">
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('producciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection