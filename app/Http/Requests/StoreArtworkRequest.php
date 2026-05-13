<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArtworkRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
            'category' => ['required', 'string', 'in:painting,sculpture,photography,digital,drawing,other'],
            'tags' => ['nullable', 'string', 'max:500'],
        ];
    }
}
