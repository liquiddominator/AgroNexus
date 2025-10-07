@extends('layouts.app')

@section('title', 'Nuevo Lote')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lotes.index') }}">Gestión de Lotes</a></li>
                <li class="breadcrumb-item active">Nuevo Lote</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Crear Nuevo Lote Agrícola</h4>
            </div>
            <form action="{{ route('lotes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Complete el formulario con la información del nuevo lote. Los campos marcados con (*) son obligatorios.
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Errores de validación:</h5>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Información Básica del Lote -->
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-clipboard"></i> Información Básica del Lote</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre del Lote <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                               id="nombre" name="nombre" value="{{ old('nombre') }}" 
                                               placeholder="Ej: Lote Norte, Parcela A, etc." required>
                                        <small class="form-text text-muted">Nombre identificativo único para el lote</small>
                                        @error('nombre')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="usuarioid">Agricultor Propietario <span class="text-danger">*</span></label>
                                        <select class="form-control @error('usuarioid') is-invalid @enderror" 
                                                id="usuarioid" name="usuarioid" required>
                                            <option value="">Seleccionar agricultor...</option>
                                            @foreach($agricultores as $agri)
                                                <option value="{{ $agri->usuarioid }}" {{ old('usuarioid') == $agri->usuarioid ? 'selected' : '' }}>
                                                    {{ $agri->nombre }} {{ $agri->apellido }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">Usuario responsable del lote</small>
                                        @error('usuarioid')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ubicacion">Ubicación <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" 
                                               id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" 
                                               placeholder="Ej: Zona Norte, Parcela A, Sector 5">
                                        <small class="form-text text-muted">Descripción textual de la ubicación del lote</small>
                                        @error('ubicacion')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="superficie">Superficie (Hectáreas) <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control @error('superficie') is-invalid @enderror" 
                                               id="superficie" name="superficie" value="{{ old('superficie', '15.50') }}" 
                                               placeholder="15.50" required>
                                        <small class="form-text text-muted">Superficie del lote en hectáreas</small>
                                        @error('superficie')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cultivo">Tipo de Cultivo <span class="text-danger">*</span></label>
                                        <select class="form-control @error('cultivo') is-invalid @enderror" 
                                                id="cultivo" name="cultivo" required>
                                            <option value="">Seleccionar tipo de cultivo...</option>
                                            <option value="Soja" {{ old('cultivo') == 'Soja' ? 'selected' : '' }}>Soja</option>
                                            <option value="Maíz" {{ old('cultivo') == 'Maíz' ? 'selected' : '' }}>Maíz</option>
                                            <option value="Trigo" {{ old('cultivo') == 'Trigo' ? 'selected' : '' }}>Trigo</option>
                                            <option value="Quinua" {{ old('cultivo') == 'Quinua' ? 'selected' : '' }}>Quinua</option>
                                            <option value="Papa" {{ old('cultivo') == 'Papa' ? 'selected' : '' }}>Papa</option>
                                            <option value="Arroz" {{ old('cultivo') == 'Arroz' ? 'selected' : '' }}>Arroz</option>
                                        </select>
                                        <small class="form-text text-muted">Cultivo principal del lote</small>
                                        @error('cultivo')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="estadoactual">Estado Inicial del Lote <span class="text-danger">*</span></label>
                                        <select class="form-control @error('estadoactual') is-invalid @enderror" 
                                                id="estadoactual" name="estadoactual">
                                            <option value="">Seleccionar estado...</option>
                                            @foreach($estados ?? [] as $estado)
                                                <option value="{{ $estado->estadoid }}" {{ old('estadoactual') == $estado->estadoid ? 'selected' : '' }}>
                                                    {{ $estado->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">Estado actual del lote</small>
                                        @error('estadoactual')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de Siembra -->
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-seedling"></i> Información de Siembra</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fechasiembra">Fecha de Siembra</label>
                                        <input type="date" class="form-control @error('fechasiembra') is-invalid @enderror" 
                                               id="fechasiembra" name="fechasiembra" value="{{ old('fechasiembra') }}">
                                        <small class="form-text text-muted">Fecha en que se realizó o planifica la siembra</small>
                                        @error('fechasiembra')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones Iniciales</label>
                                        <textarea class="form-control @error('observaciones') is-invalid @enderror" 
                                                  id="observaciones" name="observaciones" rows="3" 
                                                  placeholder="Notas adicionales sobre el estado inicial del lote...">{{ old('observaciones') }}</textarea>
                                        <small class="form-text text-muted">Información adicional sobre el lote o condiciones especiales</small>
                                        @error('observaciones')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Coordenadas Geográficas -->
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-map-marked-alt"></i> Coordenadas Geográficas (Opcional)</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="latitud">Latitud</label>
                                        <input type="number" step="0.0000001" class="form-control @error('latitud') is-invalid @enderror" 
                                               id="latitud" name="latitud" value="{{ old('latitud', '-17.783327') }}" 
                                               placeholder="-17.783327">
                                        <small class="form-text text-muted">Coordenada de latitud (formato decimal)</small>
                                        @error('latitud')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="longitud">Longitud</label>
                                        <input type="number" step="0.0000001" class="form-control @error('longitud') is-invalid @enderror" 
                                               id="longitud" name="longitud" value="{{ old('longitud', '-63.182140') }}" 
                                               placeholder="-63.182140">
                                        <small class="form-text text-muted">Coordenada de longitud (formato decimal)</small>
                                        @error('longitud')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle"></i> Las coordenadas geográficas son opcionales pero recomendadas para la visualización en el mapa de lotes. 
                                Puede obtener las coordenadas usando aplicaciones móviles o servicios como Google Maps.
                            </div>
                        </div>
                    </div>

                    <!-- Imagen del Lote -->
                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-camera"></i> Imagen del Lote (Opcional)</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Subir Imagen</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('imagenurl') is-invalid @enderror" 
                                           id="imagenurl" name="imagenurl" accept="image/*">
                                    <label class="custom-file-label" for="imagenurl">Haga clic para subir una imagen...</label>
                                    @error('imagenurl')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">
                                    <i class="fas fa-upload"></i> o arrastre y suelte una imagen aquí<br>
                                    Formatos aceptados: JPG, PNG, GIF (Máximo 5MB)
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> <strong>Importante:</strong> Al guardar el lote se creará automáticamente un registro inicial en el historial de estados. 
                        Asegúrese de que toda la información esté correcta antes de proceder.
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('lotes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-redo"></i> Limpiar
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Lote
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
// Actualizar label del input file
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').html(fileName);
});
</script>
@endsection