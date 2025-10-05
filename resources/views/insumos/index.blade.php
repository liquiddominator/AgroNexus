@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Insumos</h1>
    <a href="{{ route('insumos.create') }}" class="btn btn-primary mb-3">Nuevo Insumo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Unidad</th>
                <th>Stock</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insumos as $insumo)
            <tr>
                <td>{{ $insumo->insumoid }}</td>
                <td>{{ $insumo->nombre }}</td>
                <td>{{ $insumo->tipo }}</td>
                <td>{{ $insumo->unidad }}</td>
                <td>{{ $insumo->stock }}</td>
                <td>{{ $insumo->proveedor }}</td>
                <td>
                    <a href="{{ route('insumos.show', $insumo->insumoid) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('insumos.edit', $insumo->insumoid) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('insumos.destroy', $insumo->insumoid) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar insumo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection