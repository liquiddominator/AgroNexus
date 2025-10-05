@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Card de Usuarios -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $usuarios ?? 0 }}</h3>
                <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('usuarios.index') }}" class="small-box-footer">
                Más info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Card de Roles -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $roles ?? 0 }}</h3>
                <p>Roles del Sistema</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <a href="{{ route('roles.index') }}" class="small-box-footer">
                Más info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Card de Lotes -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $lotes ?? 0 }}</h3>
                <p>Lotes Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-seedling"></i>
            </div>
            <a href="{{ route('lotes.index') }}" class="small-box-footer">
                Más info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Card de Producción -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $producciones ?? 0 }}</h3>
                <p>Producciones</p>
            </div>
            <div class="icon">
                <i class="fas fa-tractor"></i>
            </div>
            <a href="{{ route('producciones.index') }}" class="small-box-footer">
                Más info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection