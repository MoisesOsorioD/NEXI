@extends('layouts.auth')

@section('title', 'Registro - NEXI')

@section('content')

<div class="register-container">

    <div class="register-card">

        <!-- PANEL IZQUIERDO -->
        <div class="register-left">

            <a href="/" class="register-logo-link">
                <img src="{{ asset('img/ImagoTipoNexi.svg') }}"
                     alt="NEXI"
                     class="register-logo">
            </a>

            <p>
                Conecta con proveedores verificados, descubre nuevas
                oportunidades para tu negocio y forma parte de una comunidad
                diseñada para impulsar el crecimiento de emprendedores y
                empresas en Nicaragua.
            </p>

        </div>

        <!-- PANEL DERECHO -->
        <div class="register-right">

            <div class="register-header">

                <h1 class="register-title">
                    Crea tu cuenta para conectar
                </h1>

                <p class="register-subtitle">
                    Completa tus datos para comenzar
                </p>

            </div>

            {{-- ERRORES GENERALES --}}
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <strong>Revisa los siguientes errores:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/registro">

                @csrf

                <!-- NOMBRE Y APELLIDO -->
                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label for="name" class="form-label">
                            Nombre
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Tu nombre"
                            value="{{ old('name') }}"
                            required>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label for="last_name" class="form-label">
                            Apellido
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="form-control @error('last_name') is-invalid @enderror"
                            placeholder="Tu apellido"
                            value="{{ old('last_name') }}"
                            required>

                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <!-- EMAIL -->
                <div class="mb-3">

                    <label for="email" class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="tu@email.com"
                        value="{{ old('email') }}"
                        required>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- PASSWORDS -->
                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label for="password" class="form-label">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Mínimo 5 caracteres"
                            required>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label for="password_confirmation" class="form-label">
                            Confirmar contraseña
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Repite tu contraseña"
                            required>

                    </div>

                </div>

                <!-- ROL -->
                <div class="mb-4">

                    <label for="role" class="form-label">
                        ¿Qué eres?
                    </label>

                    <select
                        id="role"
                        name="role"
                        class="form-select @error('role') is-invalid @enderror"
                        required>

                        <option value="">
                            Selecciona tu rol
                        </option>

                        <option
                            value="entrepreneur"
                            {{ old('role') == 'entrepreneur' ? 'selected' : '' }}>
                            Emprendedor / Empresa
                        </option>

                        <option
                            value="supplier"
                            {{ old('role') == 'supplier' ? 'selected' : '' }}>
                            Proveedor
                        </option>

                    </select>

                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- BOTÓN -->
                <button
                    type="submit"
                    class="btn-register w-100">
                    Registrarme
                </button>

            </form>

            <div class="register-footer">

                <p>
                    ¿Ya tienes cuenta?

                    <a href="/iniciar-sesion">
                        Inicia sesión aquí
                    </a>
                </p>

            </div>

        </div>

    </div>

</div>

@endsection