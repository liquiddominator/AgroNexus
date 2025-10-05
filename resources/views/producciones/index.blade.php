@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Producciones</h1>
    <a href="{{ route('producciones.create') }}" class="btn btn-primary mb-3">Nueva Producción</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lote</th>
                <th>Cantidad (kg)</th>
                <th>Fecha Cosecha</th>
                <th>Destino</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producciones as $produccion)
            <tr>
                <td>{{ $produccion->produccionid }}</td>
                <td>{{ $produccion->lote->nombre }}</td>
                <td>{{ $produccion->cantidadkg }}</td>
                <td>{{ $produccion->fechacosecha }}</td>
                <td>{{ $produccion->destino }}</td>
                <td>
                    <a href="{{ route('producciones.show', $produccion->produccionid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('producciones.edit', $produccion->produccionid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('producciones.destroy', $produccion->produccionid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producción?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection