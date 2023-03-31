<?php

namespace App\Http\Requests\DocumentFile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateDocumentFileRequest extends FormRequest
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
			'item' => ['required', Rule::exists('items', 'id')],
			'commune' => ['required', Rule::exists('communes', 'id')],
            'document_archive' => ['required', 'string']
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
			'item.required' => 'El Rubro es requerido',
			'item.exists' => 'El Rubro es inválido',
			'commune.required' => 'La Comuna es requerida',
			'commune.exists' => 'La Comuna es inválido',
            'document_archive' => 'Archivos solicitados debe de ser requerido'
		];
	}
}
