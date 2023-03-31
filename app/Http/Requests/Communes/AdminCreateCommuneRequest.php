<?php

namespace App\Http\Requests\Communes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminCreateCommuneRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
			'name' => ['required', Rule::unique('communes')],
			'description' => ['nullable', 'string'],
        ];
    }

	/**
	 * Get the validation messages that apply to the request.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.required' => 'La Comuna es requerida',
            'name.unique' => 'La Communa debe ser única',
		];
	}
}
