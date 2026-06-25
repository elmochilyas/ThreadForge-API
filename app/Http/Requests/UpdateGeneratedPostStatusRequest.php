<?php

namespace App\Http\Requests;

use App\Models\GeneratedPost;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGeneratedPostStatusRequest extends FormRequest
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
            'status' => [
                'required' ,
                'string' ,
                Rule::in([
                    GeneratedPost::STATUS_DRAFT,
                    GeneratedPost::STATUS_ARCHIVED,
                    GeneratedPost::STATUS_POSTED,
                ]),
            ],
        ];
    }
}
