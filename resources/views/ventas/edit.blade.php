@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Venta</h1>
    <form action="{{ route('ventas.update', $venta->ventaid) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="produccionid">Producción</label>
            <select name="produccionid" class="form-control">
                @foreach($producciones as $produccion)
                    <option value="{{ $produccion->produccionid }}" {{ $venta->produccionid == $produccion->produccionid ? 'selected' : '' }}>
                        {{ $produccion->lote->nombre }} - {{ $produccion->cantidadkg }} kg
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cliente">Cliente</label>
            <input type="text" name="cliente" class="form-control" value="{{ $venta->cliente }}">
        </div>
        <div class="mb-3">
            <label for="cantidadkg">Cantidad (kg)</label>
            <input type="number" step="0.01" name="cantidadkg" class="form-control" value="{{ $venta->cantidadkg }}" required>
        </div>
        <div class="mb-3">
            <label for="preciokg">Precio por kg</label>
            <input type="number" step="0.01" name="preciokg" class="form-control" value="{{ $venta->preciokg }}" required>
        </div>
        <div class="mb-3">
            <label for="fechaventa">Fecha de Venta</label>
            <input type="date" name="fechaventa" class="form-control" value="{{ $venta->fechaventa }}">
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $venta->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection