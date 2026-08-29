@extends('layouts.dashboard')

@section('title', 'Inicio | NEXI')

@section('page-title', 'Inicio')

@section('content')

<style>
    /* ================================
       HERO
    ================================= */

    .entrepreneur-hero {
        background: linear-gradient(135deg, #365763 0%, #294651 100%);
        border-radius: 24px;
        padding: 38px;
        color: white;
        position: relative;
        overflow: hidden;
        margin-bottom: 28px;
    }

    .entrepreneur-hero::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        right: -80px;
        top: -100px;
    }

    .entrepreneur-hero::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 193, 7, 0.08);
        right: 120px;
        bottom: -100px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.12);
        padding: 8px 14px;
        border-radius: 50px;
        font-size: 13px;
        margin-bottom: 16px;
    }

    .entrepreneur-hero h1 {
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .entrepreneur-hero p {
        color: rgba(255, 255, 255, 0.82);
        max-width: 650px;
        margin-bottom: 25px;
        font-size: 16px;
    }

    /* ================================
       BUSCADOR
    ================================= */

    .main-search {
        background: white;
        border-radius: 15px;
        padding: 7px;
        display: flex;
        align-items: center;
        max-width: 680px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .main-search i {
        color: #71818a;
        margin-left: 15px;
        font-size: 18px;
    }

    .main-search input {
        border: none;
        outline: none;
        flex: 1;
        padding: 13px 15px;
        font-size: 14px;
    }

    .main-search input::placeholder {
        color: #9aa5aa;
    }

    .search-button {
        border: none;
        background: #fdbb08;
        color: #263f49;
        font-weight: 600;
        border-radius: 11px;
        padding: 12px 22px;
        transition: 0.2s ease;
    }

    .search-button:hover {
        background: #f5ad00;
        transform: translateY(-1px);
    }

    /* ================================
       SECCIONES
    ================================= */

    .section-title {
        font-size: 21px;
        font-weight: 700;
        color: #263f49;
        margin-bottom: 5px;
    }

    .section-subtitle {
        color: #7b898f;
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* ================================
       ACCIONES RÁPIDAS
    ================================= */

    .quick-action {
        border: 1px solid #e8edef;
        background: white;
        border-radius: 17px;
        padding: 20px;
        height: 100%;
        text-decoration: none;
        display: block;
        transition: all 0.2s ease;
    }

    .quick-action:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(38, 63, 73, 0.09);
        border-color: #dbe4e7;
    }

    .quick-icon {
        width: 46px;
        height: 46px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef5f6;
        color: #365763;
        font-size: 18px;
        margin-bottom: 14px;
    }

    .quick-action h6 {
        color: #263f49;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .quick-action p {
        color: #87949a;
        font-size: 13px;
        margin: 0;
    }

    /* ================================
       CATEGORÍAS
    ================================= */

    .category-card {
        background: white;
        border: 1px solid #e8edef;
        border-radius: 16px;
        padding: 18px;
        text-align: center;
        text-decoration: none;
        display: block;
        transition: 0.2s ease;
    }

    .category-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(38, 63, 73, 0.08);
    }

    .category-icon {
        width: 50px;
        height: 50px;
        margin: 0 auto 10px;
        border-radius: 14px;
        background: #f5f8f9;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #365763;
        font-size: 19px;
    }

    .category-card span {
        color: #52636a;
        font-size: 13px;
        font-weight: 600;
    }

    /* ================================
       PROVEEDORES
    ================================= */

    .provider-card {
        background: white;
        border: 1px solid #e8edef;
        border-radius: 18px;
        padding: 20px;
        height: 100%;
        transition: 0.2s ease;
    }

    .provider-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(38, 63, 73, 0.08);
    }

    .provider-avatar {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        background: #365763;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .provider-name {
        color: #263f49;
        font-weight: 700;
        margin: 0;
    }

    .provider-type {
        color: #8a969b;
        font-size: 12px;
    }

    .provider-description {
        color: #718087;
        font-size: 13px;
        margin: 16px 0;
        line-height: 1.6;
    }

    .provider-location {
        color: #718087;
        font-size: 12px;
    }

    .provider-location i {
        color: #365763;
    }

    .rating {
        color: #fdbb08;
        font-size: 13px;
    }

    .rating-number {
        color: #65757b;
        font-size: 12px;
        margin-left: 4px;
    }

    /* ================================
       BLOQUE INFORMATIVO
    ================================= */

    .info-card {
        background: #f0f6f7;
        border-radius: 20px;
        padding: 25px;
        border: 1px solid #e0eaec;
    }

    .info-card i {
        font-size: 28px;
        color: #365763;
    }

    .info-card h5 {
        color: #263f49;
        font-weight: 700;
        margin-top: 14px;
    }

    .info-card p {
        color: #728087;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 768px) {

        .entrepreneur-hero {
            padding: 28px 22px;
        }

        .entrepreneur-hero h1 {
            font-size: 27px;
        }

        .main-search {
            display: block;
            padding: 8px;
        }

        .main-search i {
            display: none;
        }

        .main-search input {
            width: 100%;
        }

        .search-button {
            width: 100%;
        }
    }
</style>


{{-- =========================================
     HERO
========================================= --}}

<div class="entrepreneur-hero">

    <div class="hero-content">

        <span class="hero-badge">
            <i class="fa-solid fa-hand-sparkles"></i>
            Espacio para emprendedores
        </span>

        <h1>
            ¡Hola, {{ auth()->user()->name }}!
        </h1>

        <p>
            Encuentra proveedores, productos y servicios para hacer
            crecer tu negocio de una forma más fácil y organizada.
        </p>

        

    </div>

</div>


{{-- =========================================
     ACCIONES RÁPIDAS
========================================= --}}

<div class="mb-4">

    <h2 class="section-title">
        ¿Qué necesitas hoy?
    </h2>

    <p class="section-subtitle">
        Accede rápidamente a las funciones principales de NEXI.
    </p>

    <div class="row g-3">

        <div class="col-12 col-sm-6 col-xl-3">

            <a href="#" class="quick-action">

                <div class="quick-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

                <h6>Buscar proveedores</h6>

                <p>
                    Encuentra proveedores según lo que necesita tu negocio.
                </p>

            </a>

        </div>


        <div class="col-12 col-sm-6 col-xl-3">

            <a href="#" class="quick-action">

                <div class="quick-icon">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>

                <h6>Comparar opciones</h6>

                <p>
                    Compara diferentes proveedores antes de tomar una decisión.
                </p>

            </a>

        </div>


        <div class="col-12 col-sm-6 col-xl-3">

            <a href="#" class="quick-action">

                <div class="quick-icon">
                    <i class="fa-solid fa-heart"></i>
                </div>

                <h6>Mis favoritos</h6>

                <p>
                    Guarda los proveedores y publicaciones que más te interesen.
                </p>

            </a>

        </div>


        <div class="col-12 col-sm-6 col-xl-3">

            <a href="#" class="quick-action">

                <div class="quick-icon">
                    <i class="fa-solid fa-comments"></i>
                </div>

                <h6>Mis conversaciones</h6>

                <p>
                    Comunícate directamente con los proveedores.
                </p>

            </a>

        </div>

    </div>

</div>


{{-- =========================================
     CATEGORÍAS
========================================= --}}

<div class="mb-5">

    <h2 class="section-title">
        Explora categorías
    </h2>

    <p class="section-subtitle">
        Descubre productos y servicios para diferentes necesidades.
    </p>

    <div class="row g-3">

        <div class="col-6 col-md-4 col-xl-2">

            <a href="#" class="category-card">

                <div class="category-icon">
                    <i class="fa-solid fa-utensils"></i>
                </div>

                <span>Alimentos</span>

            </a>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <a href="#" class="category-card">

                <div class="category-icon">
                    <i class="fa-solid fa-box"></i>
                </div>

                <span>Productos</span>

            </a>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <a href="#" class="category-card">

                <div class="category-icon">
                    <i class="fa-solid fa-truck"></i>
                </div>

                <span>Transporte</span>

            </a>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <a href="#" class="category-card">

                <div class="category-icon">
                    <i class="fa-solid fa-laptop"></i>
                </div>

                <span>Tecnología</span>

            </a>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <a href="#" class="category-card">

                <div class="category-icon">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>

                <span>Servicios</span>

            </a>

        </div>


        <div class="col-6 col-md-4 col-xl-2">

            <a href="#" class="category-card">

                <div class="category-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </div>

                <span>Otros</span>

            </a>

        </div>

    </div>

</div>


{{-- =========================================
     PROVEEDORES DESTACADOS
========================================= --}}

<div class="mb-5">

    <div class="d-flex justify-content-between align-items-end mb-3">

        <div>

            <h2 class="section-title mb-1">
                Proveedores destacados
            </h2>

            <p class="section-subtitle mb-0">
                Algunas opciones que podrían interesarte.
            </p>

        </div>

        <a href="#" class="text-decoration-none small fw-semibold"
           style="color: #365763;">
            Ver todos
            <i class="fa-solid fa-arrow-right ms-1"></i>
        </a>

    </div>


    <div class="row g-3">

        {{-- Proveedor 1 --}}
        <div class="col-12 col-md-6 col-xl-4">

            <div class="provider-card">

                <div class="d-flex align-items-center gap-3">

                    <div class="provider-avatar">
                        <i class="fa-solid fa-store"></i>
                    </div>

                    <div>

                        <h6 class="provider-name">
                            Café del Norte
                        </h6>

                        <span class="provider-type">
                            Productos alimenticios
                        </span>

                    </div>

                </div>

                <div class="rating mt-3">

                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>

                    <span class="rating-number">
                        4.9
                    </span>

                </div>

                <p class="provider-description">
                    Proveedor de café y productos derivados para negocios y emprendimientos.
                </p>

                <div class="provider-location">
                    <i class="fa-solid fa-location-dot me-1"></i>
                    Estelí, Nicaragua
                </div>

            </div>

        </div>


        {{-- Proveedor 2 --}}
        <div class="col-12 col-md-6 col-xl-4">

            <div class="provider-card">

                <div class="d-flex align-items-center gap-3">

                    <div class="provider-avatar">
                        <i class="fa-solid fa-box-open"></i>
                    </div>

                    <div>

                        <h6 class="provider-name">
                            Distribuidora Central
                        </h6>

                        <span class="provider-type">
                            Distribución y suministros
                        </span>

                    </div>

                </div>

                <div class="rating mt-3">

                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>

                    <span class="rating-number">
                        4.6
                    </span>

                </div>

                <p class="provider-description">
                    Productos y suministros para pequeños y medianos negocios.
                </p>

                <div class="provider-location">
                    <i class="fa-solid fa-location-dot me-1"></i>
                    Managua, Nicaragua
                </div>

            </div>

        </div>


        {{-- Proveedor 3 --}}
        <div class="col-12 col-md-6 col-xl-4">

            <div class="provider-card">

                <div class="d-flex align-items-center gap-3">

                    <div class="provider-avatar">
                        <i class="fa-solid fa-gear"></i>
                    </div>

                    <div>

                        <h6 class="provider-name">
                            Soluciones Empresariales
                        </h6>

                        <span class="provider-type">
                            Servicios para empresas
                        </span>

                    </div>

                </div>

                <div class="rating mt-3">

                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>

                    <span class="rating-number">
                        4.8
                    </span>

                </div>

                <p class="provider-description">
                    Servicios pensados para apoyar el crecimiento de pequeños negocios.
                </p>

                <div class="provider-location">
                    <i class="fa-solid fa-location-dot me-1"></i>
                    Matagalpa, Nicaragua
                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================
     BLOQUE FINAL
========================================= --}}

<div class="info-card mb-4">

    <i class="fa-solid fa-lightbulb"></i>

    <h5>
        Encuentra lo que tu negocio necesita
    </h5>

    <p>
        En NEXI puedes descubrir proveedores, comparar opciones,
        guardar tus favoritos y comunicarte directamente con ellos.
        Todo desde un mismo lugar.
    </p>

</div>

@endsection