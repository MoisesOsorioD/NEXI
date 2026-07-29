<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado - NEXI</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Global -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- CSS Errors -->
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
</head>
<body>

    <div class="error-container">
        <div class="error-card">
            <div class="error-code">403</div>
            <h1 class="error-title">Acceso Denegado</h1>
            <p class="error-description">
                No tienes permiso para acceder a este contenido.
            </p>

            <div class="error-actions">
                @auth
                    @if(auth()->user()->role === 'entrepreneur')
                        <a href="{{ route('entrepreneur.dashboard') }}" class="btn btn-primary-custom btn-lg w-100 fw-600 mb-3">
                            Ir a mi Dashboard (Emprendedor)
                        </a>
                    @elseif(auth()->user()->role === 'supplier')
                        <a href="{{ route('supplier.dashboard') }}" class="btn btn-primary-custom btn-lg w-100 fw-600 mb-3">
                            Ir a mi Dashboard (Proveedor)
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary-custom btn-lg w-100 fw-600 mb-3">
                        Iniciar Sesión
                    </a>
                @endauth
                
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
