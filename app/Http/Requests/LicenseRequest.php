<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseRequest extends FormRequest
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
        'license_number' => [
            'required',
            'numeric',
            'digits:10',
            'unique:licenses,license_number,' . $this->license?->id,
        ],
        'issued_date' => [
            'required',
            'date',
            'before:expiry_date',
        ],
        'expiry_date' => [
            'required',
            'date',
            'after:issued_date',
        ],
        'license_type_id' => [
            'required',
            'exists:license_types,id',
        ],
    ];
}

public function messages(): array
{
    return [
        'license_type_id.required' => 'Debe seleccionar un tipo de licencia válido.',
        'license_type_id.exists' => 'El tipo de licencia seleccionado no existe en el sistema.',
    ];
}
}
