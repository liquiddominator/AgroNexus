@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Actividad</h1>
    <p><strong>ID:</strong> {{ $actividad->actividadid }}</p>
    <p><strong>Lote:</strong> {{ $actividad->lote->nombre }}</p>
    <p><strong>Usuario:</strong> {{ $actividad->usuario->nombre }} {{ $actividad->usuario->apellido }}</p>
    <p><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
    <p><strong>Fecha Inicio:</strong> {{ $actividad->fechainicio }}</p>
    <p><strong>Fecha Fin:</strong> {{ $actividad->fechafin }}</p>
    <p><strong>Tipo Actividad:</strong> {{ $actividad->tipoactividad }}</p>
    <p><strong>Prioridad:</strong> {{ $actividad->prioridad }}</p>
    <p><strong>Observaciones:</strong> {{ $actividad->observaciones }}</p>

    <a href="{{ route('actividades.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection