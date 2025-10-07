<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - AgroNexus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-8">
    <div class="flex max-w-5xl w-full mx-4 bg-white rounded-lg shadow-xl overflow-hidden">
        <!-- Panel Izquierdo Verde -->
        <div class="w-1/2 bg-gradient-to-br from-green-800 to-green-900 p-12 text-white flex flex-col justify-between">
            <!-- Logo y Título -->
            <div class="text-center mb-8">
                <div class="bg-green-700 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold mb-2">AgroNexus</h1>
                <p class="text-green-200">Sistema de Gestión Agrícola</p>
            </div>

            <!-- Características -->
            <div class="space-y-3">
                <div class="bg-green-700 bg-opacity-50 rounded-lg p-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-sm">Control Total</h3>
                            <p class="text-xs text-green-200">Gestiona todos tus cultivos desde una sola plataforma</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-700 bg-opacity-50 rounded-lg p-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-sm">Reportes Detallados</h3>
                            <p class="text-xs text-green-200">Analiza la productividad y optimiza procesos</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-700 bg-opacity-50 rounded-lg p-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-sm">Acceso Multiplataforma</h3>
                            <p class="text-xs text-green-200">Disponible en computadora, tablet y móvil</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-700 bg-opacity-50 rounded-lg p-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-sm">Datos Seguros</h3>
                            <p class="text-xs text-green-200">Tu información protegida con los más altos estándares</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-700 bg-opacity-50 rounded-lg p-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-sm">Trabajo Colaborativo</h3>
                            <p class="text-xs text-green-200">Comparte información con tu equipo de trabajo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Derecho - Formulario de Registro -->
        <div class="w-1/2 p-8 overflow-y-auto max-h-screen">
            <div class="max-w-md mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Crear Nueva Cuenta</h2>
                <p class="text-gray-600 mb-6 text-sm">Complete el formulario para comenzar a usar AgroNexus</p>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Nombre y Apellido -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Nombre <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="nombre" 
                                value="{{ old('nombre') }}"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                                placeholder="Su nombre"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Apellido <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="apellido" 
                                value="{{ old('apellido') }}"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                                placeholder="Su apellido"
                            >
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                            placeholder="ejemplo@correo.com"
                        >
                    </div>

                    <!-- Nombre de Usuario -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nombre de Usuario <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="nombreusuario" 
                            value="{{ old('nombreusuario') }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                            placeholder="Nombre único de usuario"
                        >
                    </div>

                    <!-- Teléfono -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Teléfono
                        </label>
                        <input 
                            type="text" 
                            name="telefono" 
                            value="{{ old('telefono') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                            placeholder="+591 XXXX XXXX"
                        >
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Contraseña <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                            placeholder="Ingrese una contraseña segura"
                        >
                        <p class="text-xs text-gray-500 mt-1">Mínimo 6 caracteres, incluya letras y números</p>
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Confirmar Contraseña <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm"
                            placeholder="Confirme su contraseña"
                        >
                    </div>

                    <!-- Botón de Registro -->
                    <button 
                        type="submit"
                        class="w-full bg-green-800 hover:bg-green-900 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 mt-6"
                    >
                        CREAR CUENTA
                    </button>
                </form>

                <!-- Link a Login -->
                <div class="mt-6 text-center">
                    <p class="text-gray-600 text-sm mb-3">¿Ya tiene una cuenta?</p>
                    <a 
                        href="{{ route('login') }}"
                        class="block w-full border-2 border-green-800 text-green-800 hover:bg-green-50 font-semibold py-2 px-4 rounded-lg transition duration-200 text-sm"
                    >
                        INICIAR SESIÓN
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>