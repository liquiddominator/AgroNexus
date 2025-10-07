<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - AgroNexus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
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
                <p class="text-green-200">Sistema de Gestión de Producción Agrícola</p>
            </div>

            <!-- Características -->
            <div class="space-y-4">
                <div class="bg-green-700 bg-opacity-50 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold">Gestión de Lotes</h3>
                            <p class="text-sm text-green-200">Control completo de cultivos y parcelas</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-700 bg-opacity-50 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 11 8.76l1-1.36 1 1.36L15.38 12 17 10.83 14.92 8H20v6z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold">Control de Inventarios</h3>
                            <p class="text-sm text-green-200">Seguimiento de insumos y materiales</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-700 bg-opacity-50 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold">Reportes Avanzados</h3>
                            <p class="text-sm text-green-200">Analytics y métricas de producción</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-700 bg-opacity-50 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.76 4.84l-1.8-1.79-1.41 1.41 1.79 1.79 1.42-1.41zM4 10.5H1v2h3v-2zm9-9.95h-2V3.5h2V.55zm7.45 3.91l-1.41-1.41-1.79 1.79 1.41 1.41 1.79-1.79zm-3.21 13.7l1.79 1.8 1.41-1.41-1.8-1.79-1.4 1.4zM20 10.5v2h3v-2h-3zm-8-5c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm-1 16.95h2V19.5h-2v2.95zm-7.45-3.91l1.41 1.41 1.79-1.8-1.41-1.41-1.79 1.8z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold">Monitoreo Climático</h3>
                            <p class="text-sm text-green-200">Seguimiento de condiciones ambientales</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center text-sm text-green-300 mt-8">
                © 2025 AgroNexus. Todos los derechos reservados.
            </div>
        </div>

        <!-- Panel Derecho Blanco - Formulario -->
        <div class="w-1/2 p-12">
            <div class="max-w-md mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Acceso al Sistema</h2>
                <p class="text-gray-600 mb-8">Ingrese sus credenciales para continuar</p>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email o Usuario -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Usuario o Email
                        </label>
                        <input 
                            type="text" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Ingrese su usuario o email"
                        >
                    </div>

                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Contraseña
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Ingrese su contraseña"
                        >
                    </div>

                    <!-- Recordar sesión -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                            >
                            <span class="ml-2 text-sm text-gray-600">Recordar sesión</span>
                        </label>
                        <a href="#" class="text-sm text-green-700 hover:text-green-800">
                            ¿Olvidó su contraseña?
                        </a>
                    </div>

                    <!-- Botón de Login -->
                    <button 
                        type="submit"
                        class="w-full bg-green-800 hover:bg-green-900 text-white font-semibold py-3 px-4 rounded-lg transition duration-200"
                    >
                        INICIAR SESIÓN
                    </button>
                </form>

                <!-- Link a Registro -->
                <div class="mt-8 text-center">
                    <p class="text-gray-600 mb-4">¿No tiene una cuenta?</p>
                    <a 
                        href="{{ route('register') }}"
                        class="block w-full border-2 border-green-800 text-green-800 hover:bg-green-50 font-semibold py-3 px-4 rounded-lg transition duration-200"
                    >
                        CREAR NUEVA CUENTA
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
