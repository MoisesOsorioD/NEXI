@extends('layouts.dashboard')

@section('title', 'Nueva Publicación')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@endpush

@section('content')

@if ($errors->any())
    <div style="background:#fee2e2;padding:15px;border-radius:10px;margin-bottom:20px;">
        <ul style="margin:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="publication-create">

    <div class="publication-header">
        <h1>Nueva publicación</h1>
        <p>Agrega un nuevo producto o servicio para mostrarlo dentro de NEXI.</p>
    </div>

    <form action="{{ route('supplier.publications.store') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

        <div class="publication-grid">

            {{-- IZQUIERDA --}}
            <div class="left-column">

                <div class="section-card">
                    <h3>Información General</h3>

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="description"></textarea>
                    </div>
                </div>

                <div class="section-card">
                    <h3>Clasificación</h3>

                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="type">
    <option value="">Seleccionar</option>
    <option value="product">Producto</option>
    <option value="service">Servicio</option>
</select>
                    </div>

                    <div class="form-group">
    <label for="category_id">Categoría</label>

    <select name="category_id" id="category_id">
        <option value="">Seleccionar</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}">
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
                        <input type="number" name="reference_price">
                    </div>

                    <div class="form-group">
                        <label>Unidad de Medida</label>
                       <input type="text" name="unit_measure">
                    </div>

                    <div class="form-group">
                        <label>Disponibilidad</label>
                        <select name="is_available">
    <option value="1">Disponible</option>
    <option value="0">No disponible</option>
</select>
                    </div>
                </div>

            </div>

            {{-- DERECHA --}}
            <div class="right-column">

                <div class="section-card">
                    <h3>Imágenes</h3>

                    <p class="images-help">
                        Puedes seleccionar hasta 5 imágenes.
                    </p>

                    <div class="images-grid">

                        @for ($i = 0; $i < 5; $i++)
                        <div class="image-box">

                            <input
                                type="file"
                                accept="image/*"
                                class="image-input"
                                id="image{{ $i }}"
                                name="images[]">

                            <label for="image{{ $i }}" class="image-label">
                                <i class="fa-solid fa-image"></i>
                            </label>

                            <img class="preview-image">

                            <button
                                type="button"
                                class="remove-image">
                                ×
                            </button>

                        </div>
                        @endfor

                    </div>
                </div>

                <div class="buttons-container">
                    <button type="submit" class="btn-save">
                        Guardar Publicación
                    </button>

                    <a href="#" class="btn-cancel">
                        Cancelar
                    </a>
                </div>

            </div>

        </div>

    </form>

</div>

<script>

document.querySelectorAll('.image-box').forEach(box => {

    const input = box.querySelector('.image-input');
    const preview = box.querySelector('.preview-image');
    const remove = box.querySelector('.remove-image');
    const label = box.querySelector('.image-label');

    input.addEventListener('change', function(){

        const file = this.files[0];

        if(!file) return;

        preview.src = URL.createObjectURL(file);

        preview.style.display = 'block';
        remove.style.display = 'flex';
        label.style.display = 'none';
    });

    remove.addEventListener('click', function(){

        input.value = '';

        preview.src = '';

        preview.style.display = 'none';
        remove.style.display = 'none';
        label.style.display = 'flex';
    });

});

</script>

@endsection