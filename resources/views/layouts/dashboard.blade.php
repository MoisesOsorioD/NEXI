<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'NEXI')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- CSS Global -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- CSS Dashboard -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<!-- CSS específicos de cada vista -->
    @stack('styles')

</head>

<body>

    <div class="dashboard-wrapper">

    {{-- SIDEBAR ESCRITORIO --}}
    <div class="desktop-sidebar">

    @if(auth()->user()->role === 'entrepreneur')

        <x-entrepreneur-sidebar />

    @else

        <x-sidebar />

    @endif

</div>

    {{-- SIDEBAR MÓVIL --}}
    <div
    class="offcanvas offcanvas-start"
    tabindex="-1"
    id="mobileSidebar"
>

    <div class="offcanvas-body p-0">

        @if(auth()->user()->role === 'entrepreneur')

            <x-entrepreneur-sidebar />

        @else

            <x-sidebar />

        @endif

    </div>

</div>

    <div class="dashboard-main">

        <x-navbar />

        <main class="dashboard-content">

            @yield('content')

        </main>

        <x-footer />

    </div>

</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>