@php
    $user = Auth::user();
@endphp

<aside class="sidebar">

    {{-- Logo --}}
    <div class="sidebar-logo">
        <a href="{{ route('entrepreneur.dashboard') }}">
            <img src="{{ asset('img/Logo Nexi blanco-06.svg') }}" alt="NEXI">
        </a>
    </div>

    {{-- Navegación --}}
    <nav class="sidebar-nav">

        {{-- Inicio --}}
        <a href="{{ route('entrepreneur.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('entrepreneur.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Inicio</span>
        </a>

        {{-- Buscar proveedores --}}
        <a  href="{{ route('entrepreneur.providers.index') }}"
        class="sidebar-link {{ request()->routeIs('entrepreneur.providers.index') ? 'active' : '' }}">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span>Buscar proveedores</span>
        </a>

        {{-- Publicaciones y Servicios --}}
        {{-- PUBLICACIONES Y SERVICIOS --}}
<a
    href="{{ route('entrepreneur.publications.index') }}"
    class="sidebar-link {{ request()->routeIs('entrepreneur.publications.*') ? 'active' : '' }}">
    <i class="fa-solid fa-box-open"></i>
    <span>Publicaciones y servicios</span>
</a>

        {{-- Comparar --}}
        <a href="{{ route('entrepreneur.compare') }}"
        class="sidebar-link {{ request()->routeIs('entrepreneur.compare') ? 'active' : '' }}">
    <i class="fa-solid fa-scale-balanced"></i>
    <span>Comparar</span>
</a>

        {{-- Favoritos --}}
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-heart"></i>
            <span>Favoritos</span>
        </a>

        {{-- Chat --}}
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-comments"></i>
            <span>Chat</span>
        </a>

        {{-- Perfil personal --}}
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-user"></i>
            <span>Perfil Personal</span>
        </a>

        {{-- Configuración --}}
        {{-- <a href="#" class="sidebar-link">
            <i class="fa-solid fa-gear"></i>
            <span>Configuración</span>
        </a> --}}

    </nav>

    {{-- Usuario --}}
    <div class="sidebar-user">

        <div class="sidebar-user-card">

            <div class="sidebar-user-avatar">
                <i class="fa-solid fa-user"></i>
            </div>

            <h4>{{ auth()->user()->name }}</h4>

            <span>Emprendedor</span>

        </div>

        {{-- Cerrar sesión --}}
        <form
            method="POST"
            action="{{ route('logout') }}"
        >

            @csrf

            <button
                type="submit"
                class="sidebar-logout-btn"
            >

                <i class="fa-solid fa-power-off"></i>

                Cerrar sesión

            </button>

        </form>

    </div>

</aside>