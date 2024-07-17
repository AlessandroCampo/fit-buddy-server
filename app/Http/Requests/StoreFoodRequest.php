<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'calories' => 'required|numeric|min:0',
            'carbs' => 'required|numeric|min:0',
            'proteins' => 'required|numeric|min:0',
            'fats' => 'required|numeric|min:0',
            'picture_url' => 'nullable|active_url',
            'bardcore' => 'nullable|string'
        ];
    }
}
