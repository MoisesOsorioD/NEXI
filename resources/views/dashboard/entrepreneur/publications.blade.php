@extends('layouts.dashboard')

@section('title', 'Publicaciones y Servicios')

@section('page-title', 'Publicaciones y Servicios')


@push('styles')

<style>

/* =========================================================
   PUBLICACIONES Y SERVICIOS
========================================================= */

.publications-page {
    padding: 10px 0 40px;
}


/* =========================================================
   ENCABEZADO
========================================================= */

.publications-header {
    margin-bottom: 28px;
}

.publications-header h1 {
    color: #294b59;
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 8px;
}

.publications-header p {
    color: #78909c;
    font-size: 16px;
    margin: 0;
}


/* =========================================================
   BUSCADOR PRINCIPAL
========================================================= */

.search-panel {
    background: linear-gradient(
        135deg,
        #315663 0%,
        #294b59 100%
    );

    border-radius: 24px;

    padding: 30px;

    margin-bottom: 32px;

    box-shadow: 0 12px 30px rgba(41, 75, 89, 0.12);
}

.search-panel-title {
    color: #ffffff;
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 18px;
}

.search-box {
    background: #ffffff;
    border-radius: 15px;

    height: 58px;

    display: flex;
    align-items: center;

    padding: 0 18px;

    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.search-box i {
    color: #78909c;
    font-size: 18px;
    margin-right: 12px;
}

.search-box input {
    border: none;
    outline: none;

    width: 100%;

    font-size: 15px;
    color: #294b59;

    background: transparent;
}

.search-box input::placeholder {
    color: #9aaeb7;
}


/* =========================================================
   FILTROS
========================================================= */

.filters-row {
    margin-top: 18px;

    display: flex;
    gap: 10px;

    flex-wrap: wrap;
}

.filter-button {
    border: 1px solid rgba(255,255,255,0.20);

    background: rgba(255,255,255,0.08);

    color: #ffffff;

    border-radius: 50px;

    padding: 9px 18px;

    font-size: 14px;
    font-weight: 500;

    cursor: pointer;

    transition: all 0.2s ease;
}

.filter-button:hover {
    background: rgba(255,255,255,0.16);
}

.filter-button.active {
    background: #fdb900;
    color: #294b59;
    border-color: #fdb900;
    font-weight: 700;
}


/* =========================================================
   CABECERA DE RESULTADOS
========================================================= */

.results-header {
    display: flex;

    justify-content: space-between;
    align-items: center;

    margin-bottom: 20px;
}

.results-title {
    color: #294b59;
    font-size: 21px;
    font-weight: 800;

    margin: 0;
}

.results-count {
    color: #8aa0aa;
    font-size: 14px;
}


/* =========================================================
   TARJETAS
========================================================= */

.publication-card {
    height: 100%;

    background: #ffffff;

    border: 1px solid #e4ebee;

    border-radius: 20px;

    overflow: hidden;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        border-color 0.25s ease;
}

.publication-card:hover {
    transform: translateY(-5px);

    border-color: #d5e1e5;

    box-shadow: 0 15px 30px rgba(41, 75, 89, 0.10);
}


/* =========================================================
   IMAGEN / CABECERA DE TARJETA
========================================================= */

.publication-image {
    height: 175px;

    background: linear-gradient(
        135deg,
        #edf6f8,
        #dcecef
    );

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;
}

.publication-image i {
    font-size: 48px;
    color: #16a6c7;
}


/* =========================================================
   ETIQUETA
========================================================= */

.publication-type {
    position: absolute;

    top: 14px;
    left: 14px;

    background: rgba(255,255,255,0.94);

    color: #315663;

    border-radius: 50px;

    padding: 6px 11px;

    font-size: 12px;
    font-weight: 700;
}

.favorite-button {
    position: absolute;

    top: 12px;
    right: 12px;

    width: 38px;
    height: 38px;

    border-radius: 50%;

    border: none;

    background: rgba(255,255,255,0.94);

    color: #8ba0a8;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: all 0.2s ease;
}

.favorite-button:hover {
    color: #e85d75;

    transform: scale(1.08);
}


/* =========================================================
   CONTENIDO
========================================================= */

.publication-body {
    padding: 21px;
}

.publication-category {
    color: #16a6c7;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 0.5px;

    margin-bottom: 7px;
}

.publication-title {
    color: #294b59;

    font-size: 19px;

    font-weight: 800;

    margin-bottom: 8px;
}

.publication-description {
    color: #78909c;

    font-size: 14px;

    line-height: 1.6;

    margin-bottom: 18px;

    min-height: 45px;
}


/* =========================================================
   PROVEEDOR
========================================================= */

.provider-info {
    display: flex;

    align-items: center;

    gap: 10px;

    padding-top: 15px;

    border-top: 1px solid #edf1f3;

    margin-bottom: 16px;
}

.provider-avatar {
    width: 38px;
    height: 38px;

    border-radius: 50%;

    background: #e9f6f8;

    color: #16a6c7;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;
}

.provider-name {
    color: #355764;

    font-size: 14px;

    font-weight: 700;
}

.provider-location {
    color: #91a4ac;

    font-size: 12px;

    margin-top: 2px;
}


/* =========================================================
   PIE DE TARJETA
========================================================= */

.publication-footer {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;
}

.publication-price {
    color: #294b59;

    font-size: 16px;

    font-weight: 800;
}

.publication-price small {
    color: #91a4ac;

    font-size: 11px;

    font-weight: 400;
}

.btn-view {
    background: #315663;

    color: #ffffff;

    border: none;

    border-radius: 11px;

    padding: 9px 15px;

    font-size: 13px;

    font-weight: 700;

    text-decoration: none;

    transition: all 0.2s ease;
}

.btn-view:hover {
    background: #294b59;

    color: #ffffff;

    transform: translateY(-1px);
}


/* =========================================================
   MENSAJE INFORMATIVO
========================================================= */

.info-section {
    margin-top: 35px;

    background: #f1f7f8;

    border-radius: 18px;

    padding: 22px;

    display: flex;

    align-items: center;

    gap: 15px;
}

.info-icon {
    width: 45px;
    height: 45px;

    border-radius: 13px;

    background: #dff2f5;

    color: #16a6c7;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;
}

.info-section strong {
    display: block;

    color: #315663;

    font-size: 14px;

    margin-bottom: 3px;
}

.info-section p {
    color: #78909c;

    font-size: 13px;

    margin: 0;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .publications-header h1 {
        font-size: 26px;
    }

    .search-panel {
        padding: 22px;
        border-radius: 18px;
    }

    .results-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 5px;
    }

}

</style>

@endpush


@section('content')

<div class="publications-page">


    {{-- =====================================================
         ENCABEZADO
    ====================================================== --}}

    <div class="publications-header">

        <h1>
            Publicaciones y servicios
        </h1>

        <p>
            Encuentra productos y servicios ofrecidos por proveedores de confianza.
        </p>

    </div>



    {{-- =====================================================
         BUSCADOR
    ====================================================== --}}

    <div class="search-panel">

        <div class="search-panel-title">

            ¿Qué estás buscando?

        </div>


        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                placeholder="Busca productos, servicios o proveedores..."
            >

        </div>


        {{-- FILTROS --}}

        <div class="filters-row">

            <button class="filter-button active">
                Todos
            </button>

            <button class="filter-button">
                Alimentos
            </button>

            <button class="filter-button">
                Materia prima
            </button>

            <button class="filter-button">
                Equipos
            </button>

            <button class="filter-button">
                Servicios
            </button>

            <button class="filter-button">
                Transporte
            </button>

        </div>

    </div>



    {{-- =====================================================
         RESULTADOS
    ====================================================== --}}

    <div class="results-header">

        <h2 class="results-title">
            Descubre opciones para tu negocio
        </h2>

        <span class="results-count">
            6 resultados encontrados
        </span>

    </div>



    {{-- =====================================================
         PUBLICACIONES
    ====================================================== --}}

    <div class="row g-4">


        {{-- CAFÉ --}}
        <div class="col-xl-4 col-md-6">

            <div class="publication-card">

                <div class="publication-image">

                    <span class="publication-type">
                        Producto
                    </span>

                    <button class="favorite-button">
                        <i class="fa-regular fa-heart"></i>
                    </button>

                    <i class="fa-solid fa-mug-hot"></i>

                </div>


                <div class="publication-body">

                    <div class="publication-category">
                        Alimentos y bebidas
                    </div>

                    <div class="publication-title">
                        Café de Palo
                    </div>

                    <p class="publication-description">
                        Café artesanal de excelente calidad,
                        ideal para cafeterías y negocios.
                    </p>


                    <div class="provider-info">

                        <div class="provider-avatar">
                            <i class="fa-solid fa-store"></i>
                        </div>

                        <div>

                            <div class="provider-name">
                                Café Nicaragüense
                            </div>

                            <div class="provider-location">
                                Estelí, Nicaragua
                            </div>

                        </div>

                    </div>


                    <div class="publication-footer">

                        <div class="publication-price">

                            C$ 180

                            <small>
                                / unidad
                            </small>

                        </div>

                        <a href="#" class="btn-view">
                            Ver detalles
                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- FRIJOLES --}}
        <div class="col-xl-4 col-md-6">

            <div class="publication-card">

                <div class="publication-image">

                    <span class="publication-type">
                        Producto
                    </span>

                    <button class="favorite-button">

                        <i class="fa-regular fa-heart"></i>

                    </button>

                    <i class="fa-solid fa-wheat-awn"></i>

                </div>


                <div class="publication-body">

                    <div class="publication-category">
                        Alimentos
                    </div>

                    <div class="publication-title">
                        Frijoles Rojos
                    </div>

                    <p class="publication-description">
                        Frijoles seleccionados de producción
                        nacional para negocios y comercios.
                    </p>


                    <div class="provider-info">

                        <div class="provider-avatar">
                            <i class="fa-solid fa-store"></i>
                        </div>

                        <div>

                            <div class="provider-name">
                                Productos del Norte
                            </div>

                            <div class="provider-location">
                                Matagalpa, Nicaragua
                            </div>

                        </div>

                    </div>


                    <div class="publication-footer">

                        <div class="publication-price">

                            C$ 95

                            <small>
                                / libra
                            </small>

                        </div>

                        <a href="#" class="btn-view">
                            Ver detalles
                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- CARTULINA --}}
        <div class="col-xl-4 col-md-6">

            <div class="publication-card">

                <div class="publication-image">

                    <span class="publication-type">
                        Producto
                    </span>

                    <button class="favorite-button">

                        <i class="fa-regular fa-heart"></i>

                    </button>

                    <i class="fa-solid fa-file-lines"></i>

                </div>


                <div class="publication-body">

                    <div class="publication-category">
                        Papelería
                    </div>

                    <div class="publication-title">
                        Cartulina Escolar
                    </div>

                    <p class="publication-description">
                        Cartulina de diferentes colores para
                        proyectos, decoración y manualidades.
                    </p>


                    <div class="provider-info">

                        <div class="provider-avatar">
                            <i class="fa-solid fa-store"></i>
                        </div>

                        <div>

                            <div class="provider-name">
                                Librería Central
                            </div>

                            <div class="provider-location">
                                Estelí, Nicaragua
                            </div>

                        </div>

                    </div>


                    <div class="publication-footer">

                        <div class="publication-price">

                            C$ 20

                            <small>
                                / unidad
                            </small>

                        </div>

                        <a href="#" class="btn-view">
                            Ver detalles
                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- TRANSPORTE --}}
        <div class="col-xl-4 col-md-6">

            <div class="publication-card">

                <div class="publication-image">

                    <span class="publication-type">
                        Servicio
                    </span>

                    <button class="favorite-button">

                        <i class="fa-regular fa-heart"></i>

                    </button>

                    <i class="fa-solid fa-truck"></i>

                </div>


                <div class="publication-body">

                    <div class="publication-category">
                        Transporte
                    </div>

                    <div class="publication-title">
                        Servicio de Transporte
                    </div>

                    <p class="publication-description">
                        Transporte de productos y mercancías
                        para pequeños y medianos negocios.
                    </p>


                    <div class="provider-info">

                        <div class="provider-avatar">
                            <i class="fa-solid fa-store"></i>
                        </div>

                        <div>

                            <div class="provider-name">
                                Transporte Express
                            </div>

                            <div class="provider-location">
                                Estelí, Nicaragua
                            </div>

                        </div>

                    </div>


                    <div class="publication-footer">

                        <div class="publication-price">

                            Desde C$ 250

                        </div>

                        <a href="#" class="btn-view">
                            Ver detalles
                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- EMPAQUES --}}
        <div class="col-xl-4 col-md-6">

            <div class="publication-card">

                <div class="publication-image">

                    <span class="publication-type">
                        Producto
                    </span>

                    <button class="favorite-button">

                        <i class="fa-regular fa-heart"></i>

                    </button>

                    <i class="fa-solid fa-box"></i>

                </div>


                <div class="publication-body">

                    <div class="publication-category">
                        Empaques
                    </div>

                    <div class="publication-title">
                        Cajas para productos
                    </div>

                    <p class="publication-description">
                        Cajas de diferentes tamaños para
                        presentación y distribución de productos.
                    </p>


                    <div class="provider-info">

                        <div class="provider-avatar">
                            <i class="fa-solid fa-store"></i>
                        </div>

                        <div>

                            <div class="provider-name">
                                Empaques Creativos
                            </div>

                            <div class="provider-location">
                                Managua, Nicaragua
                            </div>

                        </div>

                    </div>


                    <div class="publication-footer">

                        <div class="publication-price">

                            C$ 35

                            <small>
                                / unidad
                            </small>

                        </div>

                        <a href="#" class="btn-view">
                            Ver detalles
                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- DISEÑO --}}
        <div class="col-xl-4 col-md-6">

            <div class="publication-card">

                <div class="publication-image">

                    <span class="publication-type">
                        Servicio
                    </span>

                    <button class="favorite-button">

                        <i class="fa-regular fa-heart"></i>

                    </button>

                    <i class="fa-solid fa-palette"></i>

                </div>


                <div class="publication-body">

                    <div class="publication-category">
                        Diseño
                    </div>

                    <div class="publication-title">
                        Diseño para negocios
                    </div>

                    <p class="publication-description">
                        Diseño de logotipos, publicaciones y
                        material visual para tu emprendimiento.
                    </p>


                    <div class="provider-info">

                        <div class="provider-avatar">
                            <i class="fa-solid fa-store"></i>
                        </div>

                        <div>

                            <div class="provider-name">
                                Diseño Creativo
                            </div>

                            <div class="provider-location">
                                Estelí, Nicaragua
                            </div>

                        </div>

                    </div>


                    <div class="publication-footer">

                        <div class="publication-price">

                            Desde C$ 500

                        </div>

                        <a href="#" class="btn-view">
                            Ver detalles
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         INFORMACIÓN
    ====================================================== --}}

    <div class="info-section">

        <div class="info-icon">

            <i class="fa-solid fa-lightbulb"></i>

        </div>

        <div>

            <strong>
                ¿No encuentras lo que necesitas?
            </strong>

            <p>
                Prueba buscando con otras palabras o explora
                diferentes categorías para encontrar más opciones.
            </p>

        </div>

    </div>


</div>

@endsection