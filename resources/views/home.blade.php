<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXI</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Global -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- CSS Landing Page -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="container">

        <div class="hero-brand">
            <img
                src="{{ asset('img/ImagoTipoNexi.svg') }}"
                alt="NEXI"
                class="hero-logo">
        </div>

        <div class="row">
            <div class="col-lg-7">

                <h1 class="hero-title">
                    Conecta emprendedores con
                    <span class="text-highlight">
                        proveedores confiables
                    </span>
                </h1>

                <p class="hero-description">
                    NEXI es una plataforma que une emprendedores,
                    microempresas y proveedores de productos,
                    materias primas y servicios en un solo lugar.
                </p>

                <a href="/registro" class="btn-start">
                    Comenzar ahora
                </a>

                <div class="stats-row mt-5">

                    <div class="stat">
                        <h5 class="stat-number">100+</h5>
                        <p class="stat-label">Proveedores</p>
                    </div>

                    <div class="stat">
                        <h5 class="stat-number">500+</h5>
                        <p class="stat-label">Emprendedores</p>
                    </div>

                    <div class="stat">
                        <h5 class="stat-number">20+</h5>
                        <p class="stat-label">Categorías</p>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

<!-- FEATURES SECTION -->
<section class="features-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Todo lo que puedes hacer en NEXI</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h5>Buscar proveedores</h5>
                    <p>Encuentra proveedores verificados cerca de ti con filtros por categoría y departamento.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon">💬</div>
                    <h5>Comunicación directa</h5>
                    <p>Contacta con proveedores sin intermediarios mediante chat privado.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h5>Reseñas confiables</h5>
                    <p>Decide basado en experiencias reales de otros emprendedores.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GRADIENT SECTION - USO CASOS -->
<section class="use-cases-section py-5">
    <div class="container">
        <h2 class="section-title text-dark mb-5 text-center">Cómo NEXI te beneficia</h2>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="case-card">
                    <div class="case-icon">🏪</div>
                    <h5>Microempresas</h5>
                    <p>Encuentra proveedores de insumos y servicios para tu negocio.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="case-card">
                    <div class="case-icon">🏭</div>
                    <h5>Emprendedores</h5>
                    <p>Conecta con proveedores confiables de materias primas.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="case-card">
                    <div class="case-icon">📦</div>
                    <h5>Proveedores</h5>
                    <p>Llega a nuevos clientes y expande tu negocio.</p>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="benefit-card">
                    <h5 class="text-white">Ventajas para emprendedores</h5>
                    <ul class="benefits-list">
                        <li>✓ Comparar múltiples proveedores</li>
                        <li>✓ Acceso a reseñas verificadas</li>
                        <li>✓ Comunicación directa sin intermediarios</li>
                        <li>✓ Guardar proveedores favoritos</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="benefit-card">
                    <h5 class="text-white">Ventajas para proveedores</h5>
                    <ul class="benefits-list">
                        <li>✓ Crear perfil empresarial profesional</li>
                        <li>✓ Publicar productos y servicios</li>
                        <li>✓ Alcanzar nuevos clientes</li>
                        <li>✓ Recibir consultas directas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-it-works py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">¿Cómo funciona NEXI?</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h5>Regístrate</h5>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h5>Completa tu perfil</h5>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h5>Explora</h5>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h5>Conecta y crece</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="footer-copyright mb-0">© 2026 NEXI</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>