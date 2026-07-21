<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComparisonRequest extends FormRequest
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
            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'supplier_ids' => [
                'required',
                'array',
                'min:2',
                'max:4',
            ],

            'supplier_ids.*' => [
                'exists:supplier_profiles,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'supplier_ids.required' => 'Debe seleccionar al menos dos proveedores para comparar.',

            'supplier_ids.array' => 'Los proveedores seleccionados son inválidos.',

            'supplier_ids.min' => 'Debe seleccionar al menos 2 proveedores.',

            'supplier_ids.max' => 'Solo puede comparar hasta 4 proveedores en el plan gratuito.',

            'supplier_ids.*.exists' => 'Uno de los proveedores seleccionados no existe.',
        ];
    }
}