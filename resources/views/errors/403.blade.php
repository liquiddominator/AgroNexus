<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado - AgroNexus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .error-container {
            text-align: center;
            color: white;
        }
        .error-code {
            font-size: 120px;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .error-icon {
            font-size: 80px;
            margin-bottom: 20px;
            opacity: 0.9;
        }
        .error-message {
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 500;
        }
        .error-description {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .btn-home {
            background: white;
            color: #667eea;
            padding: 12px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-lock"></i>
        </div>
        <h1 class="error-code">403</h1>
        <h2 class="error-message">Acceso Denegado</h2>
        <p class="error-description">
            No tienes permisos para acceder a esta sección.<br>
            Contacta al administrador si crees que esto es un error.
        </p>
        <a href="{{ route('dashboard') }}" class="btn-home">
            <i class="fas fa-home mr-2"></i>Volver al Dashboard
        </a>
    </div>
</body>
</html>