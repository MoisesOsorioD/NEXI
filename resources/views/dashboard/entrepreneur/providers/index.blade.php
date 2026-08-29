@extends('layouts.dashboard')

@section('title', 'Buscar proveedores')

@section('content')

<style>

    .providers-page {
        padding-bottom: 40px;
    }

    /* HEADER */

    .providers-header {
        margin-bottom: 28px;
    }

    .providers-header h1 {
        font-size: 32px;
        font-weight: 800;
        color: #304f5a;
        margin-bottom: 8px;
    }

    .providers-header p {
        color: #718896;
        font-size: 16px;
        margin: 0;
    }


    /* BUSCADOR */

    .search-box {
        background: #ffffff;
        border: 1px solid #e5ebee;
        border-radius: 20px;
        padding: 22px;
        box-shadow: 0 8px 25px rgba(48, 79, 90, 0.06);
        margin-bottom: 30px;
    }

    .search-main {
        position: relative;
    }

    .search-main i {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #8ca1aa;
        font-size: 18px;
    }

    .search-main input {
        height: 54px;
        border-radius: 14px;
        border: 1px solid #dce5e9;
        padding-left: 50px;
        font-size: 15px;
        box-shadow: none;
    }

    .search-main input:focus {
        border-color: #16a8c7;
        box-shadow: 0 0 0 3px rgba(22, 168, 199, 0.10);
    }

    .filter-label {
        font-size: 13px;
        font-weight: 700;
        color: #49636d;
        margin-bottom: 7px;
    }

    .filter-select {
        height: 48px;
        border-radius: 12px;
        border: 1px solid #dce5e9;
        color: #5f7680;
        font-size: 14px;
        box-shadow: none;
    }

    .filter-select:focus {
        border-color: #16a8c7;
        box-shadow: 0 0 0 3px rgba(22, 168, 199, 0.10);
    }

    .btn-search {
        height: 48px;
        border: none;
        border-radius: 12px;
        background: #304f5a;
        color: white;
        font-weight: 700;
        padding: 0 25px;
        transition: 0.2s;
    }

    .btn-search:hover {
        background: #253f48;
        color: white;
        transform: translateY(-1px);
    }


    /* RESULTADOS */

    .results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .results-header h2 {
        font-size: 20px;
        font-weight: 800;
        color: #304f5a;
        margin: 0;
    }

    .results-count {
        font-size: 14px;
        color: #8498a1;
    }


    /* TARJETAS */

    .provider-card {
        background: white;
        border: 1px solid #e5ebee;
        border-radius: 20px;
        padding: 22px;
        height: 100%;
        box-shadow: 0 7px 22px rgba(48, 79, 90, 0.05);
        transition: all 0.2s ease;
    }

    .provider-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(48, 79, 90, 0.10);
        border-color: #d6e4e8;
    }

    .provider-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .provider-logo {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: #edf8fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #11a7c5;
        font-size: 23px;
    }

    .verified {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #edf9f2;
        color: #2d9b63;
        border-radius: 30px;
        padding: 6px 10px;
        font-size: 11px;
        font-weight: 700;
    }

    .provider-name {
        font-size: 19px;
        font-weight: 800;
        color: #304f5a;
        margin-bottom: 5px;
    }

    .provider-category {
        color: #12a4c1;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .provider-description {
        color: #758992;
        font-size: 14px;
        line-height: 1.6;
        min-height: 68px;
        margin-bottom: 18px;
    }

    .provider-info {
        display: flex;
        flex-direction: column;
        gap: 9px;
        padding: 15px 0;
        border-top: 1px solid #edf1f3;
        border-bottom: 1px solid #edf1f3;
        margin-bottom: 17px;
    }

    .provider-info span {
        color: #71858e;
        font-size: 13px;
    }

    .provider-info i {
        width: 18px;
        color: #12a4c1;
        margin-right: 6px;
    }

    .rating {
        color: #f4b400;
        font-weight: 700;
    }

    .rating-number {
        color: #687e88;
        margin-left: 4px;
    }

    .btn-profile {
        width: 100%;
        height: 45px;
        border-radius: 11px;
        border: 1px solid #dce6e9;
        background: white;
        color: #304f5a;
        font-size: 14px;
        font-weight: 700;
        transition: 0.2s;
    }

    .btn-profile:hover {
        background: #304f5a;
        border-color: #304f5a;
        color: white;
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .providers-header h1 {
            font-size: 26px;
        }

        .results-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 5px;
        }

        .search-box {
            padding: 17px;
        }

    }

</style>


<div class="providers-page">

    {{-- ENCABEZADO --}}

    <div class="providers-header">

        <h1>
            Buscar proveedores
        </h1>

        <p>
            Encuentra proveedores que puedan ayudarte a hacer crecer tu negocio.
        </p>

    </div>


    {{-- BUSCADOR Y FILTROS --}}

    <div class="search-box">

        <div class="row g-3">

            {{-- BUSCAR --}}

            <div class="col-12">

                <label class="filter-label">
                    ¿Qué estás buscando?
                </label>

                <div class="search-main">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Busca por nombre, producto o servicio..."
                    >

                </div>

            </div>


            {{-- DEPARTAMENTO --}}

            <div class="col-md-4">

                <label class="filter-label">
                    Departamento
                </label>

                <select class="form-select filter-select">

                    <option selected>
                        Todos los departamentos
                    </option>

                    <option>Estelí</option>
                    <option>Managua</option>
                    <option>Matagalpa</option>
                    <option>León</option>
                    <option>Chinandega</option>

                </select>

            </div>


            {{-- MUNICIPIO --}}

            <div class="col-md-4">

                <label class="filter-label">
                    Municipio
                </label>

                <select class="form-select filter-select">

                    <option selected>
                        Todos los municipios
                    </option>

                    <option>Estelí</option>
                    <option>Condega</option>
                    <option>La Trinidad</option>
                    <option>San Juan de Limay</option>

                </select>

            </div>


            {{-- CATEGORÍA --}}

            <div class="col-md-4">

                <label class="filter-label">
                    Categoría
                </label>

                <select class="form-select filter-select">

                    <option selected>
                        Todas las categorías
                    </option>

                    <option>Alimentos y bebidas</option>
                    <option>Materia prima</option>
                    <option>Servicios</option>
                    <option>Equipos</option>
                    <option>Transporte</option>

                </select>

            </div>


            {{-- BOTÓN --}}

            <div class="col-12 d-flex justify-content-end">

                <button class="btn-search">

                    <i class="fa-solid fa-magnifying-glass me-2"></i>

                    Buscar proveedores

                </button>

            </div>

        </div>

    </div>


    {{-- RESULTADOS --}}

    <div class="results-header">

        <h2>
            Proveedores disponibles
        </h2>

        <span class="results-count">
            6 proveedores encontrados
        </span>

    </div>


    {{-- TARJETAS --}}

    <div class="row g-4">


        {{-- PROVEEDOR 1 --}}

        <div class="col-xl-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="provider-logo">

                        <i class="fa-solid fa-mug-hot"></i>

                    </div>

                    <span class="verified">

                        <i class="fa-solid fa-circle-check"></i>

                        Verificado

                    </span>

                </div>


                <div class="provider-name">
                    Café del Norte
                </div>

                <div class="provider-category">
                    Alimentos y bebidas
                </div>

                <p class="provider-description">
                    Proveedor de café y productos derivados para negocios y emprendimientos.
                </p>


                <div class="provider-info">

                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                        Estelí, Nicaragua
                    </span>

                    <span>
                        <i class="fa-solid fa-star"></i>

                        <span class="rating">
                            4.8
                        </span>

                        <span class="rating-number">
                            (24 reseñas)
                        </span>

                    </span>

                </div>


                <button class="btn-profile">
                    Ver perfil
                    <i class="fa-solid fa-arrow-right ms-2"></i>
                </button>

            </div>

        </div>


        {{-- PROVEEDOR 2 --}}

        <div class="col-xl-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="provider-logo">

                        <i class="fa-solid fa-wheat-awn"></i>

                    </div>

                    <span class="verified">

                        <i class="fa-solid fa-circle-check"></i>

                        Verificado

                    </span>

                </div>


                <div class="provider-name">
                    Productos La Estrella
                </div>

                <div class="provider-category">
                    Materia prima
                </div>

                <p class="provider-description">
                    Distribución de materias primas y productos para pequeños negocios.
                </p>


                <div class="provider-info">

                    <span>
                        <i class="fa-solid fa-location-dot"></i>
                        Matagalpa, Nicaragua
                    </span>

                    <span>

                        <i class="fa-solid fa-star"></i>

                        <span class="rating">
                            4.6
                        </span>

                        <span class="rating-number">
                            (18 reseñas)
                        </span>

                    </span>

                </div>


                <button class="btn-profile">

                    Ver perfil

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </button>

            </div>

        </div>


        {{-- PROVEEDOR 3 --}}

        <div class="col-xl-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="provider-logo">

                        <i class="fa-solid fa-truck"></i>

                    </div>

                    <span class="verified">

                        <i class="fa-solid fa-circle-check"></i>

                        Verificado

                    </span>

                </div>


                <div class="provider-name">
                    Transporte Rápido
                </div>

                <div class="provider-category">
                    Transporte
                </div>

                <p class="provider-description">
                    Servicios de transporte para pequeños negocios y distribución de productos.
                </p>


                <div class="provider-info">

                    <span>

                        <i class="fa-solid fa-location-dot"></i>

                        Managua, Nicaragua

                    </span>

                    <span>

                        <i class="fa-solid fa-star"></i>

                        <span class="rating">
                            4.7
                        </span>

                        <span class="rating-number">
                            (31 reseñas)
                        </span>

                    </span>

                </div>


                <button class="btn-profile">

                    Ver perfil

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </button>

            </div>

        </div>


        {{-- PROVEEDOR 4 --}}

        <div class="col-xl-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="provider-logo">

                        <i class="fa-solid fa-box-open"></i>

                    </div>

                    <span class="verified">

                        <i class="fa-solid fa-circle-check"></i>

                        Verificado

                    </span>

                </div>


                <div class="provider-name">
                    Distribuidora Central
                </div>

                <div class="provider-category">
                    Productos y suministros
                </div>

                <p class="provider-description">
                    Venta y distribución de productos para diferentes tipos de emprendimientos.
                </p>


                <div class="provider-info">

                    <span>

                        <i class="fa-solid fa-location-dot"></i>

                        León, Nicaragua

                    </span>

                    <span>

                        <i class="fa-solid fa-star"></i>

                        <span class="rating">
                            4.5
                        </span>

                        <span class="rating-number">
                            (15 reseñas)
                        </span>

                    </span>

                </div>


                <button class="btn-profile">

                    Ver perfil

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </button>

            </div>

        </div>


        {{-- PROVEEDOR 5 --}}

        <div class="col-xl-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="provider-logo">

                        <i class="fa-solid fa-gears"></i>

                    </div>

                    <span class="verified">

                        <i class="fa-solid fa-circle-check"></i>

                        Verificado

                    </span>

                </div>


                <div class="provider-name">
                    Soluciones Empresariales
                </div>

                <div class="provider-category">
                    Servicios
                </div>

                <p class="provider-description">
                    Servicios especializados para apoyar el crecimiento de pequeñas empresas.
                </p>


                <div class="provider-info">

                    <span>

                        <i class="fa-solid fa-location-dot"></i>

                        Estelí, Nicaragua

                    </span>

                    <span>

                        <i class="fa-solid fa-star"></i>

                        <span class="rating">
                            4.9
                        </span>

                        <span class="rating-number">
                            (42 reseñas)
                        </span>

                    </span>

                </div>


                <button class="btn-profile">

                    Ver perfil

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </button>

            </div>

        </div>


        {{-- PROVEEDOR 6 --}}

        <div class="col-xl-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="provider-logo">

                        <i class="fa-solid fa-store"></i>

                    </div>

                    <span class="verified">

                        <i class="fa-solid fa-circle-check"></i>

                        Verificado

                    </span>

                </div>


                <div class="provider-name">
                    Comercial San José
                </div>

                <div class="provider-category">
                    Comercio
                </div>

                <p class="provider-description">
                    Productos y suministros para negocios, tiendas y emprendimientos locales.
                </p>


                <div class="provider-info">

                    <span>

                        <i class="fa-solid fa-location-dot"></i>

                        Chinandega, Nicaragua

                    </span>

                    <span>

                        <i class="fa-solid fa-star"></i>

                        <span class="rating">
                            4.4
                        </span>

                        <span class="rating-number">
                            (12 reseñas)
                        </span>

                    </span>

                </div>


                <button class="btn-profile">

                    Ver perfil

                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </button>

            </div>

        </div>

    </div>

</div>

@endsection