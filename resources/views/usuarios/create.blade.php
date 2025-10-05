@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="card">
    <div class="card-header"><h3>Nuevo Usuario</h3></div>
    <div class="card-body">
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="nombreusuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="passwordhash" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Roles</label>
                <select name="roles[]" multiple class="form-control">
                    @foreach($roles as $rol)
                        <option value="{{ $rol->rolid }}">{{ $rol->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection