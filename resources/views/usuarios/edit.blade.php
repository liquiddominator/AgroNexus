@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="card">
    <div class="card-header"><h3>Editar Usuario</h3></div>
    <div class="card-body">
        <form action="{{ route('usuarios.update', $usuario->usuarioid) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ $usuario->nombre }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" value="{{ $usuario->apellido }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $usuario->email }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="nombreusuario" value="{{ $usuario->nombreusuario }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ $usuario->telefono }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Roles</label>
                <select name="roles[]" multiple class="form-control">
                    @foreach($roles as $rol)
                        <option value="{{ $rol->rolid }}" 
                            @if($usuario->roles->contains($rol->rolid)) selected @endif>
                            {{ $rol->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Actualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection