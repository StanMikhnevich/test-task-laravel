<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class IndexAuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['nullable', 'numeric'],
            'perPage' => ['nullable', 'numeric'],
        ];
    }
}
