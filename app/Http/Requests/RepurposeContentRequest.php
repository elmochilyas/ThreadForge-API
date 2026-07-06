<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RepurposeContentRequest extends FormRequest
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
            'campaign_blueprint_id' => [
                'required',
                'integer',
                Rule::exists('campaign_blueprints', 'id')
                    ->where('user_id', $this->user()?->id),
            ],

            'content' => [
                'required',
                'string',
                'min:20',
                'max:20000',
            ],
        ];
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    public function bodyParameters(): array
    {
        return [
            'campaign_blueprint_id' => [
                'description' => 'Campaign blueprint id owned by the authenticated user.',
                'example' => 1,
            ],
            'content' => [
                'description' => 'Raw developer notes, markdown, or experience report to transform.',
                'example' => 'Today I refactored a queue worker and learned that idempotency matters more than retries.',
            ],
        ];
    }
}
