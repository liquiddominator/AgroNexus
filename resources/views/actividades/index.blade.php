@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Actividades</h1>
    <a href="{{ route('actividades.create') }}" class="btn btn-primary mb-3">Nueva Actividad</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lote</th>
                <th>Usuario</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actividades as $actividad)
            <tr>
                <td>{{ $actividad->actividadid }}</td>
                <td>{{ $actividad->lote->nombre }}</td>
                <td>{{ $actividad->usuario->nombre }} {{ $actividad->usuario->apellido }}</td>
                <td>{{ $actividad->descripcion }}</td>
                <td>{{ $actividad->fechainicio }}</td>
                <td>{{ $actividad->fechafin }}</td>
                <td>
                    <a href="{{ route('actividades.show', $actividad->actividadid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('actividades.edit', $actividad->actividadid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('actividades.destroy', $actividad->actividadid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar actividad?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection