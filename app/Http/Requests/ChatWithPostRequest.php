<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChatWithPostRequest extends FormRequest
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
            'message' => ['required', 'string', 'min:2', 'max:4000'],
            'conversation_id' => ['sometimes', 'nullable', 'uuid'],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'message' => [
                'description' => 'Natural-language question or editing instruction.',
                'example' => 'Give me 3 more aggressive hooks.',
            ],
            'conversation_id' => [
                'description' => 'Conversation id returned by a previous chat response when continuing memory.',
                'example' => '0197a467-7ac1-7000-8bbf-ccdf6b1c9261',
            ],
        ];
    }
}
