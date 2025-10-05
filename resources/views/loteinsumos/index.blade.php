@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registros de Insumos en Lotes</h1>
    <a href="{{ route('loteinsumos.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lote</th>
                <th>Insumo</th>
                <th>Usuario</th>
                <th>Cantidad Usada</th>
                <th>Fecha Uso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loteinsumos as $li)
            <tr>
                <td>{{ $li->loteinsumoid }}</td>
                <td>{{ $li->lote->nombre }}</td>
                <td>{{ $li->insumo->nombre }}</td>
                <td>{{ $li->usuario->nombre }} {{ $li->usuario->apellido }}</td>
                <td>{{ $li->cantidadusada }}</td>
                <td>{{ $li->fechauso }}</td>
                <td>
                    <a href="{{ route('loteinsumos.show', $li->loteinsumoid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('loteinsumos.edit', $li->loteinsumoid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('loteinsumos.destroy', $li->loteinsumoid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection