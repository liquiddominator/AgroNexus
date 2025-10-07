<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroNexus - @yield('title')</title>
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- CSS Adicional -->
    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Izquierda -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Derecha -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle"></i> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Mi Perfil
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Menú lateral -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <i class="fas fa-leaf ml-2"></i>
            <span class="brand-text font-weight-light">AgroNexus</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Usuario -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ Auth::user()->imagenurl ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->nombre }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->nombre }}</a>
                    <small class="text-muted">
                        @if(Auth::user()->roles->isNotEmpty())
                            {{ Auth::user()->roles->first()->nombre }}
                        @endif
                    </small>
                </div>
            </div>

            <!-- Menú -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @if(Auth::user()->tieneRol('Administrador'))
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Gestión de Roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('lotes.index') }}" class="nav-link {{ request()->routeIs('lotes.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map"></i>
                            <p>Lotes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('estadolotes.index') }}" class="nav-link {{ request()->routeIs('estadolotes.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-seedling"></i>
                            <p>Estados de Lote</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('actividades.index') }}" class="nav-link {{ request()->routeIs('actividades.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Actividades</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('climas.index') }}" class="nav-link {{ request()->routeIs('climas.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cloud-sun"></i>
                            <p>Clima</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('insumos.index') }}" class="nav-link {{ request()->routeIs('insumos.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Insumos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('loteinsumos.index') }}" class="nav-link {{ request()->routeIs('loteinsumos.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Insumos en Lotes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('producciones.index') }}" class="nav-link {{ request()->routeIs('producciones.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tractor"></i>
                            <p>Producciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ventas.index') }}" class="nav-link {{ request()->routeIs('ventas.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Ventas</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Contenido principal -->
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <footer class="main-footer text-center">
        <strong>AgroNexus &copy; {{ date('Y') }}</strong>
    </footer>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- JS Adicional -->
@yield('js')
</body>
</html>