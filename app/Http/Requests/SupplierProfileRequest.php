<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierProfileRequest extends FormRequest
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
            'business_name' => [
                'required',
                'string',
                'max:255',
            ],

            'business_type' => [
                'required',
                'string',
                'max:100',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'contact_email' => [
                'required',
                'email',
                'max:255',
            ],

            'address' => [
                'required',
                'string',
                'max:500',
            ],

            'foundation_year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:' . date('Y'),
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'municipality_id' => [
                'required',
                'exists:municipalities,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'business_name.required' => 'El nombre del negocio es obligatorio.',

            'business_type.required' => 'El tipo de negocio es obligatorio.',

            'phone.required' => 'El teléfono es obligatorio.',

            'contact_email.required' => 'El correo de contacto es obligatorio.',
            'contact_email.email' => 'Debe ingresar un correo válido.',

            'address.required' => 'La dirección es obligatoria.',

            'department_id.required' => 'Debe seleccionar un departamento.',
            'department_id.exists' => 'El departamento seleccionado no existe.',

            'municipality_id.required' => 'Debe seleccionar un municipio.',
            'municipality_id.exists' => 'El municipio seleccionado no existe.',

            'foundation_year.integer' => 'El año de fundación debe ser numérico.',
            'foundation_year.min' => 'El año de fundación no es válido.',

            'profile_photo.image' => 'El archivo debe ser una imagen.',
            'profile_photo.mimes' => 'La imagen debe ser JPG, JPEG, PNG o WEBP.',
            'profile_photo.max' => 'La imagen no puede superar los 2 MB.',
        ];
    }
}