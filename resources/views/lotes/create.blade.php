@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Lote</h1>
    <form action="{{ route('lotes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="usuarioid">Usuario (Agricultor)</label>
            <select name="usuarioid" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->usuarioid }}">{{ $usuario->nombre }} {{ $usuario->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control">
        </div>
        <div class="mb-3">
            <label for="superficie">Superficie (ha)</label>
            <input type="number" step="0.01" name="superficie" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cultivo">Cultivo</label>
            <input type="text" name="cultivo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fechasiembra">Fecha de Siembra</label>
            <input type="date" name="fechasiembra" class="form-control">
        </div>
        <div class="mb-3">
            <label for="imagenurl">Imagen (URL)</label>
            <input type="text" name="imagenurl" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('lotes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection