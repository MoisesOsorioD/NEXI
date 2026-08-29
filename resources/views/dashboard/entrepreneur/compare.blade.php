@extends('layouts.dashboard')

@section('content')

<style>
    .compare-page {
        background: #f7f9fc;
        min-height: calc(100vh - 70px);
        padding: 35px;
    }

    .compare-header {
        margin-bottom: 30px;
    }

    .compare-header h1 {
        font-size: 30px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .compare-header p {
        color: #6b7280;
        margin: 0;
        font-size: 15px;
    }

    /* Tarjeta de proveedor */
    .provider-card {
        border: none;
        border-radius: 18px;
        background: white;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        height: 100%;
        transition: all 0.25s ease;
    }

    .provider-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.10);
    }

    .provider-top {
        padding: 24px;
        border-bottom: 1px solid #eef0f4;
    }

    .provider-logo {
        width: 58px;
        height: 58px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        font-weight: 700;
        color: white;
        background: linear-gradient(135deg, #0d6efd, #4f8df7);
    }

    .provider-name {
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 3px;
    }

    .provider-location {
        font-size: 13px;
        color: #6b7280;
    }

    .rating {
        color: #f5b301;
        font-size: 14px;
    }

    .provider-body {
        padding: 22px 24px;
    }

    .info-title {
        font-size: 12px;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 7px;
    }

    .info-value {
        font-size: 15px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 18px;
    }

    .price {
        font-size: 20px;
        font-weight: 700;
        color: #0d6efd;
    }

    .badge-category {
        background: #eef5ff;
        color: #0d6efd;
        border-radius: 30px;
        padding: 6px 11px;
        font-size: 12px;
        font-weight: 600;
    }

    .btn-view {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 16px;
    }

    /* Tabla */
    .comparison-box {
        background: white;
        border-radius: 18px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        margin-top: 30px;
    }

    .comparison-title {
        padding: 24px;
        border-bottom: 1px solid #eef0f4;
    }

    .comparison-title h3 {
        font-size: 19px;
        font-weight: 700;
        margin: 0;
        color: #1f2937;
    }

    .comparison-title p {
        margin: 5px 0 0;
        color: #6b7280;
        font-size: 13px;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background: #f8fafc;
        color: #6b7280;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 17px;
        border-bottom: 1px solid #e5e7eb;
    }

    .table tbody td {
        padding: 18px 17px;
        vertical-align: middle;
        color: #374151;
        font-size: 14px;
        border-color: #f0f2f5;
    }

    .feature-name {
        font-weight: 600;
        color: #4b5563;
    }

    .check {
        color: #16a34a;
        font-size: 17px;
    }

    .cross {
        color: #d1d5db;
        font-size: 17px;
    }

    .recommended {
        background: #eff6ff !important;
    }

    .recommended-badge {
        background: #0d6efd;
        color: white;
        border-radius: 20px;
        padding: 4px 9px;
        font-size: 10px;
        font-weight: 700;
        margin-left: 5px;
    }

    /* Estado vacío */
    .empty-message {
        background: #eef5ff;
        border: 1px dashed #9ec5fe;
        border-radius: 15px;
        padding: 18px 20px;
        margin-bottom: 25px;
        color: #285b9f;
    }

    .empty-message i {
        font-size: 20px;
        margin-right: 10px;
    }

    @media (max-width: 768px) {
        .compare-page {
            padding: 20px;
        }

        .compare-header h1 {
            font-size: 25px;
        }
    }
</style>


<div class="compare-page">

    <!-- ENCABEZADO -->
    <div class="compare-header d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>
            <h1>
                <i class="fa-solid fa-scale-balanced text-primary me-2"></i>
                Comparar proveedores
            </h1>

            <p>
                Compara diferentes proveedores para encontrar la opción que mejor se adapte a tus necesidades.
            </p>
        </div>

        <a href="{{ route('entrepreneur.providers.index') }}"
           class="btn btn-outline-primary btn-view">
            <i class="fa-solid fa-magnifying-glass me-2"></i>
            Buscar proveedores
        </a>

    </div>


    <!-- MENSAJE -->
    <div class="empty-message d-flex align-items-center">
        <i class="fa-solid fa-circle-info"></i>

        <div>
            <strong>Comparación de proveedores</strong><br>
            Selecciona y analiza información como precios, ubicación, categorías y servicios ofrecidos.
        </div>
    </div>


    <!-- PROVEEDORES -->
    <div class="row g-4">

        <!-- PROVEEDOR 1 -->
        <div class="col-lg-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="d-flex align-items-center gap-3">

                        <div class="provider-logo">
                            AC
                        </div>

                        <div>
                            <div class="provider-name">
                                Agro Comercial
                            </div>

                            <div class="provider-location">
                                <i class="fa-solid fa-location-dot me-1"></i>
                                Managua, Nicaragua
                            </div>

                            <div class="rating mt-1">
                                ★★★★★
                                <span class="text-muted ms-1">(4.9)</span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="provider-body">

                    <div class="info-title">
                        Categoría
                    </div>

                    <div class="info-value">
                        <span class="badge-category">
                            Insumos agrícolas
                        </span>
                    </div>


                    <div class="info-title">
                        Productos
                    </div>

                    <div class="info-value">
                        Fertilizantes, semillas y herramientas
                    </div>


                    <div class="info-title">
                        Tiempo de respuesta
                    </div>

                    <div class="info-value">
                        Menos de 24 horas
                    </div>


                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="info-title mb-0">
                                Desde
                            </div>

                            <div class="price">
                                C$ 850
                            </div>
                        </div>

                        <button class="btn btn-primary btn-view">
                            Ver proveedor
                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- PROVEEDOR 2 -->
        <div class="col-lg-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="d-flex align-items-center gap-3">

                        <div class="provider-logo"
                             style="background: linear-gradient(135deg,#198754,#54b98a);">
                            NS
                        </div>

                        <div>
                            <div class="provider-name">
                                Nicaragua Supplies
                            </div>

                            <div class="provider-location">
                                <i class="fa-solid fa-location-dot me-1"></i>
                                Masaya, Nicaragua
                            </div>

                            <div class="rating mt-1">
                                ★★★★☆
                                <span class="text-muted ms-1">(4.6)</span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="provider-body">

                    <div class="info-title">
                        Categoría
                    </div>

                    <div class="info-value">
                        <span class="badge-category">
                            Insumos y materias primas
                        </span>
                    </div>


                    <div class="info-title">
                        Productos
                    </div>

                    <div class="info-value">
                        Materias primas y suministros
                    </div>


                    <div class="info-title">
                        Tiempo de respuesta
                    </div>

                    <div class="info-value">
                        1 - 2 días
                    </div>


                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="info-title mb-0">
                                Desde
                            </div>

                            <div class="price">
                                C$ 920
                            </div>
                        </div>

                        <button class="btn btn-primary btn-view">
                            Ver proveedor
                        </button>

                    </div>

                </div>

            </div>

        </div>


        <!-- PROVEEDOR 3 -->
        <div class="col-lg-4 col-md-6">

            <div class="provider-card">

                <div class="provider-top">

                    <div class="d-flex align-items-center gap-3">

                        <div class="provider-logo"
                             style="background: linear-gradient(135deg,#6f42c1,#a375df);">
                            PI
                        </div>

                        <div>
                            <div class="provider-name">
                                Proveedora Integral
                            </div>

                            <div class="provider-location">
                                <i class="fa-solid fa-location-dot me-1"></i>
                                León, Nicaragua
                            </div>

                            <div class="rating mt-1">
                                ★★★★☆
                                <span class="text-muted ms-1">(4.7)</span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="provider-body">

                    <div class="info-title">
                        Categoría
                    </div>

                    <div class="info-value">
                        <span class="badge-category">
                            Equipos y suministros
                        </span>
                    </div>


                    <div class="info-title">
                        Productos
                    </div>

                    <div class="info-value">
                        Equipos, herramientas y suministros
                    </div>


                    <div class="info-title">
                        Tiempo de respuesta
                    </div>

                    <div class="info-value">
                        Menos de 24 horas
                    </div>


                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <div class="info-title mb-0">
                                Desde
                            </div>

                            <div class="price">
                                C$ 780
                            </div>
                        </div>

                        <button class="btn btn-primary btn-view">
                            Ver proveedor
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TABLA DE COMPARACIÓN -->
    <div class="comparison-box">

        <div class="comparison-title">

            <h3>
                Comparación detallada
            </h3>

            <p>
                Consulta las principales características de los proveedores seleccionados.
            </p>

        </div>


        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>

                        <th style="min-width: 190px;">
                            Característica
                        </th>

                        <th>
                            Agro Comercial
                        </th>

                        <th class="recommended">
                            Nicaragua Supplies
                            <span class="recommended-badge">
                                DESTACADO
                            </span>
                        </th>

                        <th>
                            Proveedora Integral
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <tr>

                        <td class="feature-name">
                            Ubicación
                        </td>

                        <td>
                            Managua
                        </td>

                        <td class="recommended">
                            Masaya
                        </td>

                        <td>
                            León
                        </td>

                    </tr>


                    <tr>

                        <td class="feature-name">
                            Categoría
                        </td>

                        <td>
                            Insumos agrícolas
                        </td>

                        <td class="recommended">
                            Materias primas
                        </td>

                        <td>
                            Equipos
                        </td>

                    </tr>


                    <tr>

                        <td class="feature-name">
                            Calificación
                        </td>

                        <td>
                            ⭐ 4.9 / 5
                        </td>

                        <td class="recommended">
                            ⭐ 4.6 / 5
                        </td>

                        <td>
                            ⭐ 4.7 / 5
                        </td>

                    </tr>


                    <tr>

                        <td class="feature-name">
                            Respuesta rápida
                        </td>

                        <td>
                            <i class="fa-solid fa-circle-check check"></i>
                        </td>

                        <td class="recommended">
                            <i class="fa-solid fa-circle-check check"></i>
                        </td>

                        <td>
                            <i class="fa-solid fa-circle-check check"></i>
                        </td>

                    </tr>


                    <tr>

                        <td class="feature-name">
                            Variedad de productos
                        </td>

                        <td>
                            Alta
                        </td>

                        <td class="recommended">
                            Muy alta
                        </td>

                        <td>
                            Alta
                        </td>

                    </tr>


                    <tr>

                        <td class="feature-name">
                            Precio desde
                        </td>

                        <td>
                            <strong>C$ 850</strong>
                        </td>

                        <td class="recommended">
                            <strong>C$ 920</strong>
                        </td>

                        <td>
                            <strong>C$ 780</strong>
                        </td>

                    </tr>


                    <tr>

                        <td class="feature-name">
                            Contacto disponible
                        </td>

                        <td>
                            <i class="fa-solid fa-circle-check check"></i>
                        </td>

                        <td class="recommended">
                            <i class="fa-solid fa-circle-check check"></i>
                        </td>

                        <td>
                            <i class="fa-solid fa-circle-check check"></i>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection