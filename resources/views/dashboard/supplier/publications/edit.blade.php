@extends('layouts.dashboard')

@section('title', 'Editar Publicación')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@endpush

@section('content')

@if ($errors->any())
<div class="alert-errors">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="publication-create">

    <div class="publication-header">
        <h1>Editar publicación</h1>
        <p>Actualiza la información de tu producto o servicio.</p>
    </div>

    <form
        action="{{ route('supplier.publications.update', $publication) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="publication-grid">

            {{-- IZQUIERDA --}}
            <div class="left-column">

                <div class="section-card">

                    <h3>Información General</h3>

                    <div class="form-group">
                        <label>Nombre</label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $publication->name) }}">
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>

                        <textarea name="description">{{ old('description', $publication->description) }}</textarea>
                    </div>

                </div>

                <div class="section-card">

                    <h3>Clasificación</h3>

                    <div class="form-group">
                        <label>Tipo</label>

                        <select name="type">

                            <option
                                value="product"
                                {{ $publication->type == 'product' ? 'selected' : '' }}>
                                Producto
                            </option>

                            <option
                                value="service"
                                {{ $publication->type == 'service' ? 'selected' : '' }}>
                                Servicio
                            </option>

                        </select>
                    </div>

                    <div class="form-group">

                        <label>Categoría</label>

                        <select name="category_id">

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ $publication->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="section-card">

                    <h3>Información Comercial (Opcional)</h3>

                    <div class="form-group">

                        <label>Precio Referencial</label>

                        <input
                            type="number"
                            step="0.01"
                            name="reference_price"
                            value="{{ old('reference_price', $publication->reference_price) }}">

                    </div>

                    <div class="form-group">

                        <label>Unidad de Medida</label>

                        <input
                            type="text"
                            name="unit_measure"
                            value="{{ old('unit_measure', $publication->unit_measure) }}">

                    </div>

                    <div class="form-group">

                        <label>Disponibilidad</label>

                        <select name="is_available">

                            <option
                                value="1"
                                {{ $publication->is_available ? 'selected' : '' }}>
                                Disponible
                            </option>

                            <option
                                value="0"
                                {{ !$publication->is_available ? 'selected' : '' }}>
                                No disponible
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            {{-- DERECHA --}}
            <div class="right-column">

                <div class="section-card">

                    <h3>Imágenes actuales</h3>

                    <p class="images-help">
                        Vista de las imágenes asociadas a la publicación.
                    </p>

                    <div class="current-images-grid">

                        @foreach($publication->publicationImages as $image)

                            <div class="current-image-box">

                                <img
                                    src="{{ asset('storage/' . $image->image_path) }}"
                                    class="current-image">

                            </div>

                        @endforeach

                    </div>

                </div>

                <div class="buttons-container">

                    <button
                        type="submit"
                        class="btn-save">

                        Actualizar Publicación

                    </button>

                    <a
                        href="{{ route('supplier.publications.index') }}"
                        class="btn-cancel">

                        Cancelar

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection