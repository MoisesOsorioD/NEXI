<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepreneurProfileRequest extends FormRequest
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
            'phone' => [
                'required',
                'string',
                'max:20'
            ],

            'birth_date' => [
                'nullable',
                'date'
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'business_name' => [
                'required',
                'string',
                'max:255'
            ],

            'business_type' => [
                'required',
                'string',
                'max:100'
            ],

            'address' => [
                'required',
                'string',
                'max:500'
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'department_id' => [
                'required',
                'exists:departments,id'
            ],

            'municipality_id' => [
                'required',
                'exists:municipalities,id'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'El número de teléfono es obligatorio.',

            'business_name.required' => 'El nombre del negocio es obligatorio.',

            'business_type.required' => 'El tipo de negocio es obligatorio.',

            'address.required' => 'La dirección es obligatoria.',

            'department_id.required' => 'Debe seleccionar un departamento.',
            'department_id.exists' => 'El departamento seleccionado no existe.',

            'municipality_id.required' => 'Debe seleccionar un municipio.',
            'municipality_id.exists' => 'El municipio seleccionado no existe.',

            'profile_photo.image' => 'El archivo debe ser una imagen.',
            'profile_photo.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
            'profile_photo.max' => 'La imagen no puede superar los 2 MB.',
        ];
    }
}