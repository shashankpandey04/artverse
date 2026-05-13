<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminModerateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'artwork_id' => ['required', 'integer', 'exists:artworks,id'],
            'moderation_status' => ['required', 'string', 'in:approved,flagged,rejected'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
