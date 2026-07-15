<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
                'max:1000',
            ],

            'type' => [
                'required',
                'in:product,service',
            ],

            'reference_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'unit_measure' => [
                'nullable',
                'string',
                'max:50',
            ],

            'is_available' => [
                'required',
                'boolean',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'images' => [
                'nullable',
                'array',
                'max:5',
            ],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la publicación es obligatorio.',

            'description.required' => 'La descripción es obligatoria.',

            'type.required' => 'Debe seleccionar un tipo.',
            'type.in' => 'El tipo seleccionado no es válido.',

            'reference_price.numeric' => 'El precio debe ser numérico.',

            'category_id.required' => 'Debe seleccionar una categoría.',
            'category_id.exists' => 'La categoría seleccionada no existe.',

            'images.array' => 'Las imágenes son inválidas.',
            'images.max' => 'Solo puede subir hasta 5 imágenes.',

            'images.*.image' => 'Cada archivo debe ser una imagen.',
            'images.*.mimes' => 'Las imágenes deben ser JPG, JPEG, PNG o WEBP.',
            'images.*.max' => 'Cada imagen puede pesar hasta 2 MB.',
        ];
    }
}