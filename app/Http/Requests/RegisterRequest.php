<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Creator display name.',
                'example' => 'Thread Forge',
            ],
            'email' => [
                'description' => 'Unique creator email address.',
                'example' => 'creator@example.com',
            ],
            'password' => [
                'description' => 'Password with at least 8 characters.',
                'example' => 'password123',
            ],
            'password_confirmation' => [
                'description' => 'Password confirmation.',
                'example' => 'password123',
            ],
        ];
    }
}
