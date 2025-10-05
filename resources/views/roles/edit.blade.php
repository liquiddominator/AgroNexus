@extends('layouts.app')

@section('title', 'Editar Rol')

@section('content')
<div class="card">
    <div class="card-header"><h3>Editar Rol</h3></div>
    <div class="card-body">
        <form action="{{ route('roles.update', $rol->rolid) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ $rol->nombre }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control">{{ $rol->descripcion }}</textarea>
            </div>
            <button class="btn btn-success">Actualizar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection