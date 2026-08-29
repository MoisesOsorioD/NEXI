@extends('layouts.dashboard')

@section('title', 'Inicio - NEXI')

@section('page-title', 'Inicio')

@section('content')

<style>

    /* =========================================================
       INICIO PROVEEDOR - NEXI
    ========================================================= */

    .nexi-home {
        max-width: 1450px;
        margin: 0 auto;
    }

    /* =========================================================
       HERO PRINCIPAL
    ========================================================= */

    .nexi-hero {
        min-height: 430px;
        border-radius: 30px;
        overflow: hidden;
        position: relative;

        background:
            linear-gradient(
                120deg,
                #294b57 0%,
                #345e6b 50%,
                #487886 100%
            );

        display: flex;
        align-items: center;

        padding: 55px;

        color: white;

        margin-bottom: 28px;
    }

    .nexi-hero::before {
        content: "";

        position: absolute;

        width: 450px;
        height: 450px;

        border-radius: 50%;

        border: 70px solid rgba(255,255,255,.035);

        right: -170px;
        top: -180px;
    }

    .nexi-hero::after {
        content: "";

        position: absolute;

        width: 250px;
        height: 250px;

        border-radius: 50%;

        background: rgba(255,255,255,.035);

        right: 190px;
        bottom: -170px;
    }

    .hero-content {
        position: relative;
        z-index: 3;

        max-width: 700px;
    }

    .hero-label {
        display: inline-flex;

        align-items: center;
        gap: 8px;

        padding: 8px 13px;

        border-radius: 30px;

        background: rgba(255,255,255,.10);

        border: 1px solid rgba(255,255,255,.12);

        font-size: 13px;

        margin-bottom: 22px;

        color: rgba(255,255,255,.85);
    }

    .hero-title {
        font-size: clamp(38px, 5vw, 64px);

        font-weight: 800;

        line-height: 1.05;

        letter-spacing: -2px;

        margin: 0 0 20px;
    }

    .hero-title span {
        color: #fbbd08;
    }

    .hero-description {
        font-size: 17px;

        line-height: 1.7;

        color: rgba(255,255,255,.78);

        max-width: 620px;

        margin-bottom: 30px;
    }

    .hero-actions {
        display: flex;

        gap: 12px;

        flex-wrap: wrap;
    }

    .hero-primary {
        background: #fbbd08;

        color: #294b57;

        border: none;

        padding: 13px 21px;

        border-radius: 12px;

        font-weight: 700;

        text-decoration: none;

        display: inline-flex;

        align-items: center;

        gap: 9px;

        transition: .25s ease;
    }

    .hero-primary:hover {
        background: #ffca2c;

        color: #294b57;

        transform: translateY(-2px);
    }

    .hero-secondary {
        background: rgba(255,255,255,.08);

        color: white;

        border: 1px solid rgba(255,255,255,.18);

        padding: 13px 21px;

        border-radius: 12px;

        font-weight: 600;

        text-decoration: none;

        display: inline-flex;

        align-items: center;

        gap: 9px;

        transition: .25s ease;
    }

    .hero-secondary:hover {
        background: rgba(255,255,255,.14);

        color: white;
    }


    /* =========================================================
       TEXTO DE SECCIÓN
    ========================================================= */

    .home-section {
        margin-bottom: 30px;
    }

    .section-heading {
        margin-bottom: 17px;
    }

    .section-heading small {
        display: block;

        color: #13a6c4;

        font-weight: 700;

        font-size: 12px;

        text-transform: uppercase;

        letter-spacing: 1px;

        margin-bottom: 5px;
    }

    .section-heading h2 {
        margin: 0;

        color: #294b57;

        font-size: 25px;

        font-weight: 800;
    }

    .section-heading p {
        margin: 7px 0 0;

        color: #7a8b92;

        font-size: 14px;
    }


    /* =========================================================
       ACCESOS
    ========================================================= */

    .quick-grid {
        display: grid;

        grid-template-columns:
            1.2fr
            .9fr
            .9fr;

        gap: 18px;
    }

    .quick-card {
        min-height: 190px;

        border-radius: 23px;

        padding: 26px;

        background: white;

        border: 1px solid #e6ecef;

        position: relative;

        overflow: hidden;

        text-decoration: none;

        transition: .3s ease;

        display: flex;

        flex-direction: column;

        justify-content: space-between;
    }

    .quick-card:hover {
        transform: translateY(-5px);

        box-shadow:
            0 18px 40px rgba(35,63,72,.10);

        border-color: #d4e4e8;
    }

    .quick-card.featured {
        background: #eef8fa;

        border-color: #d7edf1;
    }

    .quick-card-icon {
        width: 52px;
        height: 52px;

        border-radius: 15px;

        display: flex;

        align-items: center;
        justify-content: center;

        background: white;

        color: #13a6c4;

        font-size: 20px;

        box-shadow: 0 5px 15px rgba(35,63,72,.06);
    }

    .quick-card h3 {
        color: #294b57;

        font-size: 19px;

        font-weight: 800;

        margin: 20px 0 6px;
    }

    .quick-card p {
        color: #778990;

        font-size: 14px;

        line-height: 1.5;

        margin: 0;

        max-width: 360px;
    }

    .quick-arrow {
        position: absolute;

        top: 25px;
        right: 25px;

        width: 35px;
        height: 35px;

        border-radius: 50%;

        background: white;

        display: flex;

        align-items: center;
        justify-content: center;

        color: #8aa0a8;

        transition: .25s ease;
    }

    .quick-card:hover .quick-arrow {
        background: #13a6c4;

        color: white;

        transform: translateX(3px);
    }


    /* =========================================================
       BLOQUE INFERIOR
    ========================================================= */

    .discover-layout {
        display: grid;

        grid-template-columns: 1.5fr .8fr;

        gap: 20px;
    }


    /* =========================================================
       PANEL DE PRESENCIA
    ========================================================= */

    .presence-card {
        background: white;

        border: 1px solid #e6ecef;

        border-radius: 25px;

        padding: 30px;

        position: relative;

        overflow: hidden;
    }

    .presence-card::after {
        content: "NEXI";

        position: absolute;

        right: -15px;
        bottom: -40px;

        font-size: 120px;

        font-weight: 900;

        color: #f3f7f8;

        pointer-events: none;
    }

    .presence-content {
        position: relative;

        z-index: 2;
    }

    .presence-icon {
        width: 57px;
        height: 57px;

        border-radius: 17px;

        background: #294b57;

        color: #fbbd08;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 21px;

        margin-bottom: 20px;
    }

    .presence-card h2 {
        color: #294b57;

        font-size: 23px;

        font-weight: 800;

        margin-bottom: 10px;
    }

    .presence-card p {
        color: #73858d;

        max-width: 650px;

        line-height: 1.7;

        font-size: 14px;

        margin-bottom: 22px;
    }

    .presence-link {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        color: #13a6c4;

        font-size: 14px;

        font-weight: 700;

        text-decoration: none;
    }

    .presence-link:hover {
        color: #0c849e;
    }


    /* =========================================================
       MENSAJE
    ========================================================= */

    .message-card {
        background:
            linear-gradient(
                145deg,
                #fbbd08,
                #ffd45b
            );

        border-radius: 25px;

        padding: 30px;

        color: #294b57;

        position: relative;

        overflow: hidden;

        min-height: 250px;

        display: flex;

        flex-direction: column;

        justify-content: space-between;
    }

    .message-card::before {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        border-radius: 50%;

        background: rgba(255,255,255,.16);

        right: -70px;
        top: -70px;
    }

    .message-card i.main-icon {
        font-size: 27px;

        position: relative;

        z-index: 2;
    }

    .message-card h3 {
        font-size: 23px;

        font-weight: 800;

        line-height: 1.2;

        margin: 20px 0 8px;

        position: relative;

        z-index: 2;
    }

    .message-card p {
        font-size: 14px;

        line-height: 1.6;

        margin: 0;

        opacity: .8;

        position: relative;

        z-index: 2;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1000px) {

        .quick-grid {
            grid-template-columns: 1fr 1fr;
        }

        .quick-card.featured {
            grid-column: span 2;
        }

        .discover-layout {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 700px) {

        .nexi-hero {
            padding: 35px 25px;

            min-height: 400px;
        }

        .hero-title {
            font-size: 38px;
        }

        .hero-description {
            font-size: 15px;
        }

        .quick-grid {
            grid-template-columns: 1fr;
        }

        .quick-card.featured {
            grid-column: auto;
        }

    }

</style>


<div class="nexi-home">


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="nexi-hero">

        <div class="hero-content">

            <div class="hero-label">

                <i class="fa-solid fa-sparkles"></i>

                Espacio para proveedores

            </div>

            <h1 class="hero-title">

                Hola,
                <span>{{ Auth::user()->name }}</span> 👋

            </h1>

            <p class="hero-description">

                Tu empresa ya tiene un espacio en NEXI.
                Comparte lo que haces, muestra tus servicos y productos
                y permite que nuevos emprendedores encuentren
                lo que necesitan para hacer crecer sus negocios.

            </p>

            <div class="hero-actions">

                <a href="#" class="hero-primary">

                    <i class="fa-solid fa-store"></i>

                    Ver mi perfil empresarial

                </a>

                <a href="#" class="hero-secondary">

                    <i class="fa-solid fa-circle-plus"></i>

                    Crear publicación

                </a>

            </div>

        </div>

    </section>


    {{-- =====================================================
         ACCESOS
    ====================================================== --}}

    <section class="home-section">

        <div class="section-heading">

            <small>
                Tu espacio
            </small>

            <h2>
                ¿Qué quieres hacer?
            </h2>

            <p>
                Accede rápidamente a las herramientas principales de NEXI.
            </p>

        </div>


        <div class="quick-grid">


            {{-- PERFIL --}}

            <a href="#" class="quick-card featured">

                <div class="quick-arrow">

                    <i class="fa-solid fa-arrow-up-right-from-square"></i>

                </div>

                <div>

                    <div class="quick-card-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>

                    <h3>
                        Mi empresa
                    </h3>

                    <p>
                        Presenta tu negocio, agrega información
                        importante y permite que los emprendedores
                        conozcan mejor lo que ofreces.
                    </p>

                </div>

            </a>


            {{-- PUBLICACIONES --}}

            <a href="#" class="quick-card">

                <div class="quick-arrow">

                    <i class="fa-solid fa-arrow-right"></i>

                </div>

                <div>

                    <div class="quick-card-icon">

                        <i class="fa-solid fa-layer-group"></i>

                    </div>

                    <h3>
                        Publicaciones
                    </h3>

                    <p>
                        Comparte tus productos y servicios
                        dentro de NEXI.
                    </p>

                </div>

            </a>


            {{-- CHAT --}}

            <a href="#" class="quick-card">

                <div class="quick-arrow">

                    <i class="fa-solid fa-arrow-right"></i>

                </div>

                <div>

                    <div class="quick-card-icon">

                        <i class="fa-solid fa-comments"></i>

                    </div>

                    <h3>
                        Mensajes
                    </h3>

                    <p>
                        Comunícate directamente con emprendedores
                        interesados en tu negocio.
                    </p>

                </div>

            </a>

        </div>

    </section>


    {{-- =====================================================
         PARTE INFERIOR
    ====================================================== --}}

    <section class="discover-layout">


        {{-- PRESENCIA --}}

        <div class="presence-card">

            <div class="presence-content">

                <div class="presence-icon">

                    <i class="fa-solid fa-bullseye"></i>

                </div>

                <h2>
                    Haz que tu empresa sea fácil de encontrar.
                </h2>

                <p>
                    NEXI está pensado para acercar proveedores
                    y emprendedores. Mantén la información de
                    tu empresa clara y comparte aquello que
                    realmente puedes ofrecer.
                </p>

                <a href="#" class="presence-link">

                    Administrar mi empresa

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>


        {{-- MENSAJE --}}

        <div class="message-card">

            <i class="fa-solid fa-lightbulb main-icon"></i>

            <div>

                <h3>
                    Tu negocio puede ser justo lo que alguien está buscando.
                </h3>

                <p>
                    Comparte lo que haces y conecta con nuevas oportunidades.
                </p>

            </div>

        </div>


    </section>


</div>

@endsection