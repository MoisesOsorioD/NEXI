@extends('layouts.dashboard')

@section('title', 'Detalle de Publicación')

@section('page-title', 'Detalle de Publicación')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@endpush

@section('content')

<div class="publication-show-container">

    {{-- BOTÓN VOLVER --}}
    <a
        href="{{ route('supplier.publications.index') }}"
        class="btn-back"
    >
        <i class="fa-solid fa-arrow-left"></i>
        Volver a Publicaciones
    </a>

    {{-- TARJETA PRINCIPAL --}}
    <div class="publication-show-card">

        {{-- GALERÍA DE IMÁGENES --}}
        @if($publication->publicationImages->count())

            <div class="publication-gallery">

                @foreach($publication->publicationImages as $image)

                    <img
                        src="{{ asset('storage/' . $image->image_path) }}"
                        alt="{{ $publication->name }}"
                        class="publication-gallery-image"
                    >

                @endforeach

            </div>

        @else

            <div class="publication-gallery-empty">

                <i class="fa-solid fa-image"></i>

                <p>
                    Esta publicación no tiene imágenes.
                </p>

            </div>

        @endif

        {{-- TÍTULO --}}
        <h1>
            {{ $publication->name }}
        </h1>

        {{-- INFORMACIÓN --}}
        <div class="publication-show-info">

            <div>

                <strong>Tipo</strong>

                <p>
                    {{ $publication->type === 'product'
                        ? 'Producto'
                        : 'Servicio'
                    }}
                </p>

            </div>

            <div>

                <strong>Categoría</strong>

                <p>
                    {{ $publication->category?->name ?? 'Sin categoría' }}
                </p>

            </div>

            <div>

                <strong>Precio Referencial</strong>

                <p>
                    ${{ number_format($publication->reference_price ?? 0, 2) }}
                </p>

            </div>

            <div>

                <strong>Unidad de Medida</strong>

                <p>
                    {{ $publication->unit_measure ?? 'No especificada' }}
                </p>

            </div>

            <div>

                <strong>Estado</strong>

                <p>

                    <span class="btn-show-status {{ $publication->is_available ? 'available' : 'unavailable' }}">

                        {{ $publication->is_available
                            ? 'Disponible'
                            : 'No disponible'
                        }}

                    </span>

                </p>

            </div>

        </div>

        {{-- DESCRIPCIÓN --}}
        <div class="publication-description-box">

            <h4>
                Descripción
            </h4>

            <p>
                {{ $publication->description }}
            </p>

        </div>

        

    </div>

</div>

@endsection