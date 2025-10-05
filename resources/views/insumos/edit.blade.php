@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Insumo</h1>
    <form action="{{ route('insumos.update', $insumo->insumoid) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $insumo->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" class="form-control" value="{{ $insumo->tipo }}">
        </div>
        <div class="mb-3">
            <label for="unidad">Unidad</label>
            <input type="text" name="unidad" class="form-control" value="{{ $insumo->unidad }}">
        </div>
        <div class="mb-3">
            <label for="stock">Stock</label>
            <input type="number" step="0.01" name="stock" class="form-control" value="{{ $insumo->stock }}">
        </div>
        <div class="mb-3">
            <label for="stockminimo">Stock Mínimo</label>
            <input type="number" step="0.01" name="stockminimo" class="form-control" value="{{ $insumo->stockminimo }}">
        </div>
        <div class="mb-3">
            <label for="proveedor">Proveedor</label>
            <input type="text" name="proveedor" class="form-control" value="{{ $insumo->proveedor }}">
        </div>
        <div class="mb-3">
            <label for="preciounitario">Precio Unitario</label>
            <input type="number" step="0.01" name="preciounitario" class="form-control" value="{{ $insumo->preciounitario }}">
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $insumo->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection