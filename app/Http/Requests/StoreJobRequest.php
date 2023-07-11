<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string|max:2000',
            'price' => 'required|integer'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'price' => str_replace( ['£', ',', ' '], ['', '', ''], $this->price ),
        ]);

        $this->merge([
            'price' => intval(  $this->price * 100 ),
        ]);
    }

    public function messages()
    {
        return [
            'title.string' => "Title must be a string",
            'description.string' => "Description must be a string",
            'description.max' => "Description is too long. Please keep below 2000 characters"
        ];
    }

}
