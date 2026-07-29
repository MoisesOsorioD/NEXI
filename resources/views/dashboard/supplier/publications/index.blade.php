@extends('layouts.dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@endpush

@section('content')

<div class="publications-page">

    {{-- HEADER --}}
    <div class="publications-header">

        <h1 class="publications-title">
            Mis Publicaciones
        </h1>

        <p class="publications-subtitle">
            Administra todos los productos y servicios que compartes en NEXI.
        </p>

    </div>

    {{-- BOTÓN NUEVA PUBLICACIÓN --}}
    <div class="publication-create-container">

        <a
            href="{{ route('supplier.publications.create') }}"
            class="publication-create-btn"
        >
            <i class="fa-solid fa-plus"></i>
        </a>

    </div>

    {{-- MENSAJE DE ÉXITO --}}
    @if(session('success'))

        <div class="alert alert-success mb-4">

            {{ session('success') }}

        </div>

    @endif

    {{-- GRID DE PUBLICACIONES --}}
    <div class="publications-grid">

        @forelse($publications as $publication)

            <div class="publication-card">

                {{-- IMAGEN --}}
                <div class="publication-image-container">

                    @if($publication->publicationImages->isNotEmpty())

                        <img
                            src="{{ asset('storage/' . $publication->publicationImages->first()->image_path) }}"
                            alt="{{ $publication->name }}"
                            class="publication-image"
                        >

                    @else

                        <img
                            src="{{ asset('img/no-image.png') }}"
                            alt="Sin imagen"
                            class="publication-image"
                        >

                    @endif

                </div>

                {{-- FOOTER CARD --}}
                <div class="publication-footer">

                    <h3 class="publication-name">

                        {{ $publication->name }}

                    </h3>

                    <div class="publication-actions">

                        {{-- VER --}}
                        <a
                            href="{{ route('supplier.publications.show', $publication) }}"
                            class="publication-action-btn view-btn"
                            title="Ver publicación"
                        >
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        {{-- EDITAR --}}
                        <a
                            href="{{ route('supplier.publications.edit', $publication) }}"
                            class="publication-action-btn edit-btn"
                            title="Editar publicación"
                        >
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        {{-- ELIMINAR --}}
                        <form
                            action="{{ route('supplier.publications.destroy', $publication) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="publication-action-btn delete-btn"
                                title="Eliminar publicación"
                                onclick="return confirm('¿Deseas eliminar esta publicación?')"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-publications">

                <i class="fa-solid fa-box-open"></i>

                <h3>
                    No tienes publicaciones registradas
                </h3>

                <p>
                    Crea tu primera publicación para comenzar.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection