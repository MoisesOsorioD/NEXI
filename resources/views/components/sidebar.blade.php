
<aside class="sidebar">

    <div class="sidebar-top">

        <div class="sidebar-header">

            <a
                href="{{ route('supplier.dashboard') }}"
                class="sidebar-logo-link"
            >

                <img
                    src="{{ asset('img/Logo Nexi blanco-06.svg') }}"
                    alt="NEXI"
                    class="sidebar-logo"
                >

            </a>

        </div>

        <nav class="sidebar-nav">

            <a
                href="{{ route('supplier.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('supplier.dashboard') ? 'active' : '' }}"
            >
                <i class="fa-solid fa-house sidebar-icon"></i>
                <span>Inicio</span>
            </a>

            <a
                href="{{ route('supplier.publications.index') }}"
                class="sidebar-link {{ request()->routeIs('supplier.publications.*') ? 'active' : '' }}"
            >
                <i class="fa-solid fa-box sidebar-icon"></i>
                <span>Publicaciones</span>
            </a>

            <a href="{{ route('supplier.chat') }}"
   class="sidebar-link {{ request()->routeIs('supplier.chat') ? 'active' : '' }}">

    <i class="fa-solid fa-comments"></i>

    <span>Chat</span>

</a>

            <a href="#" class="sidebar-link">
                <i class="fa-solid fa-building sidebar-icon"></i>
                <span>Perfil Empresarial</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="fa-solid fa-user sidebar-icon"></i>
                <span>Perfil Personal</span>
            </a>

            <a href="#" class="sidebar-link">
                <i class="fa-solid fa-gear sidebar-icon"></i>
                <span>Configuración</span>
            </a>

        </nav>

    </div>

    <div class="sidebar-bottom">

        <div class="sidebar-user-card">

            <div class="sidebar-user-avatar">
                <i class="fa-solid fa-user"></i>
            </div>

            <h4>{{ auth()->user()->name }}</h4>

            <span>Proveedor</span>

        </div>

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