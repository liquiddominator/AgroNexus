@extends('layouts.app')

@section('title', 'Detalle de Usuario')

@section('content')
<div class="card">
    <div class="card-header"><h3>Detalle del Usuario</h3></div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $usuario->usuarioid }}</p>
        <p><strong>Nombre:</strong> {{ $usuario->nombre }} {{ $usuario->apellido }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Usuario:</strong> {{ $usuario->nombreusuario }}</p>
        <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
        <p><strong>Roles:</strong> 
            @foreach($usuario->roles as $rol)
                <span class="badge badge-info">{{ $rol->nombre }}</span>
            @endforeach
        </p>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection