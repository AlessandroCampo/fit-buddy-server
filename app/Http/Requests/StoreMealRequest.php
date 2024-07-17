<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMealRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'meal_type' => 'required|string|in:breakfast,snack, lunch, dinner',
            'food_ids' => 'required|array|min:1',
            'food_ids.*' => 'exists:foods,id',
            'food_ids.*.quantity' => 'required|numeric|min:0',
        ];
    }
}
