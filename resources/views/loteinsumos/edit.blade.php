@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Registro de Insumo en Lote</h1>
    <form action="{{ route('loteinsumos.update', $loteinsumo->loteinsumoid) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="loteid">Lote</label>
            <select name="loteid" class="form-control">
                @foreach($lotes as $lote)
                    <option value="{{ $lote->loteid }}" {{ $loteinsumo->loteid == $lote->loteid ? 'selected' : '' }}>
                        {{ $lote->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="insumoid">Insumo</label>
            <select name="insumoid" class="form-control">
                @foreach($insumos as $insumo)
                    <option value="{{ $insumo->insumoid }}" {{ $loteinsumo->insumoid == $insumo->insumoid ? 'selected' : '' }}>
                        {{ $insumo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="usuarioid">Usuario</label>
            <select name="usuarioid" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->usuarioid }}" {{ $loteinsumo->usuarioid == $usuario->usuarioid ? 'selected' : '' }}>
                        {{ $usuario->nombre }} {{ $usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidadusada">Cantidad Usada</label>
            <input type="number" step="0.01" name="cantidadusada" class="form-control" value="{{ $loteinsumo->cantidadusada }}" required>
        </div>
        <div class="mb-3">
            <label for="costototal">Costo Total</label>
            <input type="number" step="0.01" name="costototal" class="form-control" value="{{ $loteinsumo->costototal }}">
        </div>
        <div class="mb-3">
            <label for="estado">Estado</label>
            <input type="text" name="estado" class="form-control" value="{{ $loteinsumo->estado }}">
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $loteinsumo->observaciones }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('loteinsumos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection