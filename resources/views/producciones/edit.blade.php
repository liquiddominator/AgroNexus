@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producción</h1>
    <form action="{{ route('producciones.update', $produccion->produccionid) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="loteid">Lote</label>
            <select name="loteid" class="form-control">
                @foreach($lotes as $lote)
                    <option value="{{ $lote->loteid }}" {{ $produccion->loteid == $lote->loteid ? 'selected' : '' }}>
                        {{ $lote->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidadkg">Cantidad (kg)</label>
            <input type="number" step="0.01" name="cantidadkg" class="form-control" value="{{ $produccion->cantidadkg }}" required>
        </div>
        <div class="mb-3">
            <label for="fechacosecha">Fecha de Cosecha</label>
            <input type="date" name="fechacosecha" class="form-control" value="{{ $produccion->fechacosecha }}">
        </div>
        <div class="mb-3">
            <label for="destino">Destino</label>
            <input type="text" name="destino" class="form-control" value="{{ $produccion->destino }}">
        </div>
        <div class="mb-3">
            <label for="imagenurl">Imagen (URL)</label>
            <input type="text" name="imagenurl" class="form-control" value="{{ $produccion->imagenurl }}">
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $produccion->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('producciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection