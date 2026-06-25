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
            'name' => ['required', 'string' , 'max:255'],
            'tone' => ['required', 'string' , 'max:255'],
            'max_hashtags' => ['required', 'integer' , 'min:0' ,'max:5'],
            'max_characters' => ['required' , 'integer' , 'min:1' , 'max:200'],
            'additional_rules' => ['nullable' , 'string' ,'max:5000'],
        ];
    }
}
