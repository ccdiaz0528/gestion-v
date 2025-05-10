<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'brand' => [
                'required',
                'string',
                'max:60',
            ],
            'plate' => [
                'required',
                'string',
                'max:6',
                'regex:/^[A-Z]{3}\d{3}$|^[A-Z]{3}\d{2}[A-Z]$/i', // Formatos: ABC123 o ABC12C
                'unique:vehicles,plate,' . $this->vehicle?->id, // Único, excepto si es edición
            ],
            'year' => [
                'required',
                'integer',
                'digits:4', // Exactamente 4 dígitos
                'min:1900',
                'max:' . (date('Y') + 1), // Hasta un año adelante
            ],
            'color' => [
                'required',
                'string',
                'max:30',
            ],
        ];
    }

    /**
     * Mensajes personalizados para errores de validación.
     */
    public function messages(): array
    {
        return [
            // Marca
            'brand.required' => 'La marca del vehículo es obligatoria.',
            'brand.string' => 'La marca debe ser un texto válido.',
            'brand.max' => 'La marca no puede tener más de 60 caracteres.',

            // Placa
            'plate.required' => 'La placa del vehículo es obligatoria.',
            'plate.string' => 'La placa debe ser un texto válido.',
            'plate.max' => 'La placa no puede tener más de 6 caracteres.',
            'plate.regex' => 'La placa debe tener un formato válido (Ej: ABC123 o ABC12C).',
            'plate.unique' => 'Esta placa ya está registrada en el sistema.',

            // Año
            'year.required' => 'El año del vehículo es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.digits' => 'El año debe tener exactamente 4 dígitos.',
            'year.min' => 'El año no puede ser menor a 1900.',
            'year.max' => 'El año no puede ser mayor al actual +1.',

            // Color
            'color.required' => 'El color del vehículo es obligatorio.',
            'color.string' => 'El color debe ser un texto válido.',
            'color.max' => 'El color no puede tener más de 30 caracteres.',
        ];
    }
}
