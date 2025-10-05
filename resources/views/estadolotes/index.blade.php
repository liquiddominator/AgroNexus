@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estados de Lotes</h1>
    <a href="{{ route('estadolotes.create') }}" class="btn btn-primary mb-3">Nuevo Estado</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lote</th>
                <th>Estado</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados as $estado)
            <tr>
                <td>{{ $estado->estadoid }}</td>
                <td>{{ $estado->lote->nombre }}</td>
                <td>{{ $estado->estado }}</td>
                <td>{{ $estado->fecharegistro }}</td>
                <td>
                    <a href="{{ route('estadolotes.show', $estado->estadoid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('estadolotes.edit', $estado->estadoid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('estadolotes.destroy', $estado->estadoid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar estado?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection