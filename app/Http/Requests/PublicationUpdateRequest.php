<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'typePub' => 'required|string|min:2|max:20',
            'contenu_pub' => 'sometimes|string',
            'file' => 'sometime|mimes:jpeg,png,jpg,gif|max:3072',
        ];
    }
}
