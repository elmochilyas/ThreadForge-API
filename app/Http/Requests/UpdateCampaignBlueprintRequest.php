<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCampaignBlueprintRequest extends FormRequest
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
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'tone' => ['sometimes', 'required', 'string', 'max:255'],
            'max_hashtags' => ['sometimes', 'required', 'integer', 'min:0', 'max:5'],
            'max_characters' => ['sometimes', 'required', 'integer', 'min:1', 'max:280'],
            'additional_rules' => ['sometimes', 'nullable', 'string', 'max:5000'],
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
                'example' => 'Sharper launch posts',
            ],
            'tone' => [
                'description' => 'Writing tone to enforce.',
                'example' => 'Direct and technical',
            ],
            'max_hashtags' => [
                'description' => 'Maximum number of hashtags allowed.',
                'example' => 1,
            ],
            'max_characters' => [
                'description' => 'Maximum hook length.',
                'example' => 240,
            ],
            'additional_rules' => [
                'description' => 'Extra style constraints for the AI.',
                'example' => 'Use short paragraphs and no generic motivational line.',
            ],
        ];
    }
}
