@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Editar Usuario</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header bg-warning">
                <h4 class="mb-0"><i class="fas fa-user-edit"></i> Editar Usuario</h4>
            </div>
            <form action="{{ route('usuarios.update', $usuario->usuarioid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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

                    <!-- Información actual del usuario -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $usuario->imagenurl ?? 'https://ui-avatars.com/api/?name=' . urlencode($usuario->nombre . ' ' . $usuario->apellido) . '&background=random&size=80' }}" 
                                             class="img-circle elevation-2 mr-3" width="80" height="80">
                                        <div>
                                            <h5 class="mb-1">{{ $usuario->nombre }} {{ $usuario->apellido }}</h5>
                                            <p class="mb-0 text-muted">{{ '@' . $usuario->nombreusuario }}</p>
                                            <p class="mb-0">
                                                @foreach($usuario->roles as $rol)
                                                    @if($rol->nombre == 'Administrador')
                                                        <span class="badge badge-warning">{{ $rol->nombre }}</span>
                                                    @else
                                                        <span class="badge badge-info">{{ $rol->nombre }}</span>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                       id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
                                @error('nombre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" 
                                       id="apellido" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" required>
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
                                       id="nombreusuario" name="nombreusuario" value="{{ old('nombreusuario', $usuario->nombreusuario) }}" required>
                                @error('nombreusuario')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
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
                                       id="telefono" name="telefono" value="{{ old('telefono', $usuario->telefono) }}" 
                                       placeholder="+591 00000000">
                                @error('telefono')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passwordhash">Nueva Contraseña</label>
                                <input type="password" class="form-control @error('passwordhash') is-invalid @enderror" 
                                       id="passwordhash" name="passwordhash">
                                <small class="form-text text-muted">Dejar en blanco para mantener la actual. Mínimo 6 caracteres si desea cambiarla</small>
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
                                           {{ (is_array(old('roles')) ? in_array($rol->rolid, old('roles')) : $usuario->roles->contains($rol->rolid)) ? 'checked' : '' }}>
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
                        <label for="imagenurl">Cambiar Imagen de Perfil</label>
                        @if($usuario->imagenurl)
                            <div class="mb-2">
                                <small class="text-muted">Imagen actual:</small><br>
                                <img src="{{ $usuario->imagenurl }}" class="img-thumbnail" width="100">
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('imagenurl') is-invalid @enderror" 
                                   id="imagenurl" name="imagenurl" accept="image/*">
                            <label class="custom-file-label" for="imagenurl">Seleccionar nueva imagen...</label>
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
                                   name="activo" value="1" {{ old('activo', $usuario->activo) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="activo">
                                <strong>Usuario activo</strong>
                                <br><small class="text-muted">El usuario podrá acceder al sistema</small>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Actualizar Usuario
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