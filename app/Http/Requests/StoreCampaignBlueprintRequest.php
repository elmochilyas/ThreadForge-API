<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignBlueprintRequest extends FormRequest
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
            'tone' => ['required', 'string', 'max:255'],
            'max_hashtags' => ['required', 'integer', 'min:0', 'max:5'],
            'max_characters' => ['required', 'integer', 'min:1', 'max:280'],
            'additional_rules' => ['nullable', 'string', 'max:5000'],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Blueprint name.',
                'example' => 'Tech community daily posts',
            ],
            'tone' => [
                'description' => 'Writing tone to enforce.',
                'example' => 'Professional but relaxed',
            ],
            'max_hashtags' => [
                'description' => 'Maximum number of hashtags allowed.',
                'example' => 1,
            ],
            'max_characters' => [
                'description' => 'Maximum hook length.',
                'example' => 280,
            ],
            'additional_rules' => [
                'description' => 'Extra style constraints for the AI.',
                'example' => 'Avoid buzzwords and end with a concrete lesson.',
            ],
        ];
    }
}
