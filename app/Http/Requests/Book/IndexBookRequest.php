<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class IndexBookRequest extends FormRequest
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
