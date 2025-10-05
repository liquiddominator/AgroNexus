@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estado de Lote</h1>
    <form action="{{ route('estadolotes.update', $estado->estadoid) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="loteid">Lote</label>
            <select name="loteid" class="form-control">
                @foreach($lotes as $lote)
                    <option value="{{ $lote->loteid }}" {{ $estado->loteid == $lote->loteid ? 'selected' : '' }}>
                        {{ $lote->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="estado">Estado</label>
            <input type="text" name="estado" class="form-control" value="{{ $estado->estado }}" required>
        </div>
        <div class="mb-3">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" class="form-control">{{ $estado->observaciones }}</textarea>
        </div>
        <div class="mb-3">
            <label for="imagenurl">Imagen (URL)</label>
            <input type="text" name="imagenurl" class="form-control" value="{{ $estado->imagenurl }}">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('estadolotes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection