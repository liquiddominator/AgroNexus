@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registros Climáticos</h1>
    <a href="{{ route('climas.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lote</th>
                <th>Fecha</th>
                <th>Temperatura</th>
                <th>Humedad</th>
                <th>Lluvia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($climas as $clima)
            <tr>
                <td>{{ $clima->climaid }}</td>
                <td>{{ $clima->lote->nombre }}</td>
                <td>{{ $clima->fecha }}</td>
                <td>{{ $clima->temperatura }}</td>
                <td>{{ $clima->humedad }}</td>
                <td>{{ $clima->lluvia }}</td>
                <td>
                    <a href="{{ route('climas.show', $clima->climaid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('climas.edit', $clima->climaid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('climas.destroy', $clima->climaid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro climático?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection