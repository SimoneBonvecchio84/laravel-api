<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreProjectRequest extends FormRequest
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
            'title'    => ['required', 'min:5', Rule::unique('projects')->ignore($this->project)],
            'content'  => ['nullable', 'min:20'],

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'il titolo non può essere vuoto',
            'title.min'      => 'il titolo deve contenere come minimo di :min caratteri',
            'title.unique'   => 'Non si possono avere due titoli uguali',
            'content.min'    => 'la descrizione deve avere come minimo di 20 caratteri',
        ];
    }
}
