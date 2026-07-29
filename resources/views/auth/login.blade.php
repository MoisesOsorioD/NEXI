@extends('layouts.auth')

@section('title', 'Iniciar Sesión - NEXI')

@section('content')

<div class="auth-container">

    <div class="auth-card">

        <!-- PANEL IZQUIERDO -->
        <div class="auth-info">

            <div class="auth-info-content">

                <a href="/">
                    <img src="{{ asset('img/logito.svg') }}"
                         alt="NEXI"
                         class="auth-logo">
                </a>

                <p class="auth-info-text">
                    Accede a tu cuenta y continúa conectando con proveedores,
                    descubriendo oportunidades y haciendo crecer tu negocio
                    dentro de la comunidad NEXI.
                </p>

            </div>

        </div>

        <!-- PANEL DERECHO -->
        <div class="auth-content">

            <div class="auth-header">

                <h1 class="auth-title">
                    Inicia sesión para conectar
                </h1>

                <p class="auth-subtitle">
                    Ingresa tus credenciales para continuar
                </p>

            </div>

            {{-- ERRORES GENERALES --}}
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <strong>Revisa los campos:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/iniciar-sesion" class="auth-form">

                @csrf

                <!-- EMAIL -->
                <div class="form-group">

                    <label for="email" class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        placeholder="tu@email.com"
                        value="{{ old('email') }}"
                        required
                    >

                    @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <!-- PASSWORD -->
                <div class="form-group">

                    <label for="password" class="form-label">
                        Contraseña
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input @error('password') is-invalid @enderror"
                        placeholder="Tu contraseña"
                        required
                    >

                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <!-- BOTÓN -->
                <button
                    type="submit"
                    class="btn btn-primary-custom w-100">
                    Ingresar
                </button>

            </form>

            <div class="auth-footer">

                <p class="auth-link">
                    ¿No tienes cuenta?
                    <a href="/registro">
                        Regístrate aquí
                    </a>
                </p>

            </div>

        </div>

    </div>

</div>

@endsection