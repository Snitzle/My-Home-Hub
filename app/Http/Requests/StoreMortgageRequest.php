<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMortgageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'monthly_payment' => 'required|numeric',
            'mortgage_type' => 'required|exists:property_mortgage_rate_types,id',
            'interest_rate' => 'required|numeric',
            'term_length' => 'required|integer',
            'start_date' => 'required|date'
        ];
    }
}
