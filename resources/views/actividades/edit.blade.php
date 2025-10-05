@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Actividad</h1>
    <form action="{{ route('actividades.update', $actividad->actividadid) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="loteid">Lote</label>
            <select name="loteid" class="form-control">
                @foreach($lotes as $lote)
                    <option value="{{ $lote->loteid }}" {{ $actividad->loteid == $lote->loteid ? 'selected' : '' }}>
                        {{ $lote->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="usuarioid">Usuario</label>
            <select name="usuarioid" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->usuarioid }}" {{ $actividad->usuarioid == $usuario->usuarioid ? 'selected' : '' }}>
                        {{ $usuario->nombre }} {{ $usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ $actividad->descripcion }}" required>
        </div>
        <div class="mb-3">
            <label for="fechainicio">Fecha Inicio</label>
            <input type="date" name="fechainicio" class="form-control" value="{{ $actividad->fechainicio }}">
        </div>
        <div class="mb-3">
            <label for="fechafin">Fecha Fin</label>
            <input type="date" name="fechafin" class="form-control" value="{{ $actividad->fechafin }}">
        </div>
        <div class="mb-3">
            <label for="tipoactividad">Tipo de Actividad</label>
            <input type="text" name="tipoactividad" class="form-control" value="{{ $actividad->tipoactividad }}">
        </div>
        <div class="mb-3">
            <label for="prioridad">Prioridad</label>
            <input type="text" name="prioridad" class="form-control" value="{{ $actividad->prioridad }}">
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $actividad->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('actividades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection