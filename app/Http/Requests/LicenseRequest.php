<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

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
                'before_or_equal:' . Date::now()->addYears(2)->format('Y-m-d'), // Máximo 2 años en el futuro
                'after_or_equal:1900-01-01', // Mínimo año válido
                'before:expiry_date', // Debe ser anterior a expiry_date
            ],
            'expiry_date' => [
                'required',
                'date',
                'after:issued_date',
                function ($attribute, $value, $fail) {
                    if ($this->issued_date) {
                        $issuedDate   = Carbon::parse($this->issued_date);
                        $expectedDate = $issuedDate->copy()->addYears(10);
                        $inputDate    = Carbon::parse($value);
                        // Permitir que la fecha sea exactamente 10 años después o 10 años menos 1 día
                        if (!$inputDate->equalTo($expectedDate) && !$inputDate->equalTo($expectedDate->copy()->subDay())) {
                            $fail('La fecha de vencimiento debe ser exactamente 10 años después de la fecha de expedición.');
                        }
                    }
                },
            ],
            'license_type_id' => [
                'required',
                'exists:license_types,id',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            // Número de licencia
            'license_number.required' => 'El número de licencia es obligatorio.',
            'license_number.numeric' => 'El número de licencia debe contener solo números.',
            'license_number.digits' => 'El número de licencia debe tener exactamente 10 dígitos (como la cédula colombiana).',
            'license_number.unique' => 'Este número de licencia ya está registrado.',

            // Fecha de expedición
            'issued_date.required' => 'La fecha de expedición es obligatoria.',
            'issued_date.date' => 'La fecha de expedición debe ser una fecha válida.',
            'issued_date.before_or_equal' => 'La fecha de expedición no puede ser mayor a 2 años en el futuro.',
            'issued_date.after_or_equal' => 'La fecha de expedición no puede ser menor al año 1900.',
            'issued_date.before' => 'La fecha de expedición debe ser anterior a la fecha de vencimiento.',

            // Fecha de vencimiento
            'expiry_date.required' => 'La fecha de vencimiento es obligatoria.',
            'expiry_date.date' => 'La fecha de vencimiento debe ser una fecha válida.',
            'expiry_date.after' => 'La fecha de vencimiento debe ser posterior a la fecha de expedición.',
            'expiry_date.date_equals' => 'La fecha de vencimiento debe ser exactamente 10 años después de la fecha de expedición.',

            // Tipo de licencia
            'license_type_id.required' => 'Debe seleccionar un tipo de licencia válido.',
            'license_type_id.exists' => 'El tipo de licencia seleccionado no existe en el sistema.',
        ];
    }
}
