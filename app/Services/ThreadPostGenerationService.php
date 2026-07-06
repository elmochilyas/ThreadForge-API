<?php

namespace App\Services;

use App\Ai\Agents\PostGenerationAgent;
use App\Models\RawContent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use RuntimeException;

class ThreadPostGenerationService
{
    /**
     * @return array{
     *     hook_propose: string,
     *     body_points: array<int, string>,
     *     technical_readability_score: int,
     *     suggested_hashtags: array<int, string>,
     *     tone_compliance_justification: string,
     *     payload_brut: array<string, mixed>
     * }
     */
    public function generate(RawContent $rawContent): array
    {
        $rawContent->loadMissing('campaignBlueprint');

        $response = (new PostGenerationAgent($rawContent->campaignBlueprint))->prompt(
            prompt: $this->promptFor($rawContent),
        );

        if (! property_exists($response, 'structured')) {
            throw new RuntimeException('The AI provider did not return structured data.');
        }

        return $this->normalize($response->structured);
    }

    protected function promptFor(RawContent $rawContent): string
    {
        return <<<PROMPT
Repurpose the following raw developer content into a post draft for X.

Raw content:
{$rawContent->content}
PROMPT;
    }

    /**
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    protected function normalize(array $payload): array
    {
        $requiredKeys = [
            'hook_propose',
            'body_points',
            'technicalreadabilityscore',
            'suggested_hashtags',
            'tonecompliancejustification',
        ];

        $missing = array_diff($requiredKeys, array_keys($payload));
        $extra = array_diff(array_keys($payload), $requiredKeys);

        if ($missing !== [] || $extra !== []) {
            throw new RuntimeException('The AI structured output keys do not match the required contract.');
        }

        $validator = Validator::make($payload, [
            'hook_propose' => ['required', 'string', 'max:280'],
            'body_points' => ['required', 'array', 'min:1'],
            'body_points.*' => ['required', 'string'],
            'technicalreadabilityscore' => ['required', 'integer', 'min:0', 'max:100'],
            'suggested_hashtags' => ['required', 'array'],
            'suggested_hashtags.*' => ['required', 'string'],
            'tonecompliancejustification' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return [
            'hook_propose' => $payload['hook_propose'],
            'body_points' => array_values($payload['body_points']),
            'technical_readability_score' => (int) $payload['technicalreadabilityscore'],
            'suggested_hashtags' => array_values($payload['suggested_hashtags']),
            'tone_compliance_justification' => $payload['tonecompliancejustification'],
            'payload_brut' => $payload,
        ];
    }
}
