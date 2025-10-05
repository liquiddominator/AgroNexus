@extends('layouts.app')

@section('title', 'Detalle del Rol')

@section('content')
<div class="card">
    <div class="card-header"><h3>Detalle del Rol</h3></div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $rol->rolid }}</p>
        <p><strong>Nombre:</strong> {{ $rol->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $rol->descripcion }}</p>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection