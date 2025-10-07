@extends('layouts.app')

@section('title', 'Nuevo Usuario')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Nuevo Usuario</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-user-plus"></i> Crear Nuevo Usuario</h4>
            </div>
            <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                       id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" 
                                       id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                                @error('apellido')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombreusuario">Nombre de Usuario <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nombreusuario') is-invalid @enderror" 
                                       id="nombreusuario" name="nombreusuario" value="{{ old('nombreusuario') }}" required>
                                @error('nombreusuario')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" class="form-control @error('telefono') is-invalid @enderror" 
                                       id="telefono" name="telefono" value="{{ old('telefono') }}" 
                                       placeholder="+591 00000000">
                                @error('telefono')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passwordhash">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('passwordhash') is-invalid @enderror" 
                                       id="passwordhash" name="passwordhash" required>
                                <small class="form-text text-muted">Mínimo 6 caracteres</small>
                                @error('passwordhash')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Roles del Usuario <span class="text-danger">*</span></label>
                        <div class="card">
                            <div class="card-body">
                                @foreach($roles as $rol)
                                <div class="custom-control custom-checkbox mb-2">
                                    <input class="custom-control-input" type="checkbox" 
                                           id="rol{{ $rol->rolid }}" name="roles[]" 
                                           value="{{ $rol->rolid }}"
                                           {{ (is_array(old('roles')) && in_array($rol->rolid, old('roles'))) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="rol{{ $rol->rolid }}">
                                        @if($rol->nombre == 'Administrador')
                                            <i class="fas fa-user-shield text-warning"></i>
                                        @else
                                            <i class="fas fa-tractor text-success"></i>
                                        @endif
                                        <strong>{{ $rol->nombre }}</strong>
                                        @if($rol->descripcion)
                                            <br><small class="text-muted">{{ $rol->descripcion }}</small>
                                        @endif
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <small class="form-text text-muted">Seleccione al menos un rol</small>
                    </div>

                    <div class="form-group">
                        <label for="imagenurl">Imagen de Perfil</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('imagenurl') is-invalid @enderror" 
                                   id="imagenurl" name="imagenurl" accept="image/*">
                            <label class="custom-file-label" for="imagenurl">Seleccionar imagen...</label>
                            @error('imagenurl')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <small class="form-text text-muted">
                            Formatos aceptados: JPG, PNG, GIF. Tamaño máximo: 2MB
                        </small>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="activo" 
                                   name="activo" value="1" {{ old('activo', true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="activo">
                                <strong>Usuario activo</strong>
                                <br><small class="text-muted">El usuario podrá acceder al sistema inmediatamente</small>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Usuario
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