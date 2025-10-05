@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Estado de Lote</h1>
    <form action="{{ route('estadolotes.store') }}" method="POST">
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
            <label for="estado">Estado</label>
            <input type="text" name="estado" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="imagenurl">Imagen (URL)</label>
            <input type="text" name="imagenurl" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('estadolotes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection