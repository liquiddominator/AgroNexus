@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Actividad</h1>
    <form action="{{ route('actividades.store') }}" method="POST">
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
            <label for="usuarioid">Usuario</label>
            <select name="usuarioid" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->usuarioid }}">{{ $usuario->nombre }} {{ $usuario->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fechainicio">Fecha Inicio</label>
            <input type="date" name="fechainicio" class="form-control">
        </div>
        <div class="mb-3">
            <label for="fechafin">Fecha Fin</label>
            <input type="date" name="fechafin" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tipoactividad">Tipo de Actividad</label>
            <input type="text" name="tipoactividad" class="form-control">
        </div>
        <div class="mb-3">
            <label for="prioridad">Prioridad</label>
            <input type="text" name="prioridad" class="form-control">
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection