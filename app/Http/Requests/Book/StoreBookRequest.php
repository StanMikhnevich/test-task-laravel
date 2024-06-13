<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'desc' => ['nullable', 'string'],
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'published_at' => ['required', 'date'],

            'authors' => ['required'],
            'authors.*' => ['integer'],
        ];
    }
}
