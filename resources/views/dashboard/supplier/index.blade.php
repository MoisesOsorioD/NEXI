@extends('layouts.dashboard')

@section('title', 'Dashboard Proveedor')

@section('page-title', 'Dashboard')

@section('content')

<div class="dashboard-home">

    {{-- BIENVENIDA --}}
    <div class="welcome-card">

        <h2 class="welcome-title">
            Hola, {{ Auth::user()->name }} 👋
        </h2>

        <p class="welcome-text">
            Bienvenido nuevamente a NEXI.
            Gestiona tu perfil empresarial y conecta con emprendedores de forma profesional.
        </p>

    </div>

    {{-- FILA SUPERIOR --}}
    <div class="dashboard-row">

        {{-- ACTIVIDAD PUBLICACIONES --}}
        <div class="dashboard-card dashboard-large">

            <h3 class="dashboard-card-title">
                Actividad de Publicaciones
            </h3>

            <div class="activity-items">

                <div class="activity-item">

                    <i class="fa-solid fa-box activity-icon"></i>

                    <div>

                        <strong>
                            Café de Palo
                        </strong>

                        <p>
                            Publicación creada recientemente
                        </p>

                    </div>

                </div>

                <div class="activity-item">

                    <i class="fa-solid fa-box activity-icon"></i>

                    <div>

                        <strong>
                            Frijoles Rojos
                        </strong>

                        <p>
                            Publicación actualizada
                        </p>

                    </div>

                </div>

                <div class="activity-item">

                    <i class="fa-solid fa-screwdriver-wrench activity-icon"></i>

                    <div>

                        <strong>
                            Servicio de Transporte
                        </strong>

                        <p>
                            Servicio agregado
                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- ÚLTIMAS PUBLICACIONES --}}
        <div class="dashboard-card dashboard-small">

            <h3 class="dashboard-card-title">
                Últimas Publicaciones
            </h3>

            <div class="publication-list">

                <div class="publication-item">

                    <i class="fa-solid fa-box"></i>

                    <span>
                        Café de Palo
                    </span>

                </div>

                <div class="publication-item">

                    <i class="fa-solid fa-box"></i>

                    <span>
                        Cartulina Escolar
                    </span>

                </div>

                <div class="publication-item">

                    <i class="fa-solid fa-screwdriver-wrench"></i>

                    <span>
                        Servicio de Transporte
                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- ACTIVIDAD GENERAL --}}
    <div class="dashboard-card">

        <h3 class="dashboard-card-title">
            Actividad Reciente
        </h3>

        <div class="activity-items">

            <div class="activity-item">

                <i class="fa-solid fa-eye activity-icon"></i>

                <div>

                    <strong>
                        Visita al perfil
                    </strong>

                    <p>
                        Un emprendedor visitó tu empresa.
                    </p>

                </div>

            </div>

            <div class="activity-item">

                <i class="fa-solid fa-star activity-icon"></i>

                <div>

                    <strong>
                        Empresa guardada
                    </strong>

                    <p>
                        Tu empresa fue agregada a favoritos.
                    </p>

                </div>

            </div>

            <div class="activity-item">

                <i class="fa-solid fa-magnifying-glass activity-icon"></i>

                <div>

                    <strong>
                        Resultado de búsqueda
                    </strong>

                    <p>
                        Tu perfil apareció en una búsqueda.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection