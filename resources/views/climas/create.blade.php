@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Registro Climático</h1>
    <form action="{{ route('climas.store') }}" method="POST">
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
            <label for="fecha">Fecha</label>
            <input type="datetime-local" name="fecha" class="form-control">
        </div>
        <div class="mb-3">
            <label for="temperatura">Temperatura (°C)</label>
            <input type="number" step="0.01" name="temperatura" class="form-control">
        </div>
        <div class="mb-3">
            <label for="humedad">Humedad (%)</label>
            <input type="number" step="0.01" name="humedad" class="form-control">
        </div>
        <div class="mb-3">
            <label for="lluvia">Lluvia (mm)</label>
            <input type="number" step="0.01" name="lluvia" class="form-control">
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('climas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection