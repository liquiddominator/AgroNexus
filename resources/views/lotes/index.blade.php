@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Lotes</h1>
    <a href="{{ route('lotes.create') }}" class="btn btn-primary mb-3">Nuevo Lote</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Cultivo</th>
                <th>Superficie (ha)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lotes as $lote)
            <tr>
                <td>{{ $lote->loteid }}</td>
                <td>{{ $lote->nombre }}</td>
                <td>{{ $lote->usuario->nombre }} {{ $lote->usuario->apellido }}</td>
                <td>{{ $lote->cultivo }}</td>
                <td>{{ $lote->superficie }}</td>
                <td>
                    <a href="{{ route('lotes.show', $lote->loteid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('lotes.edit', $lote->loteid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('lotes.destroy', $lote->loteid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar lote?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection