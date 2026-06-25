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
        return false;
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
}
