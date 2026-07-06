<?php

namespace App\Ai\Agents;

use App\Models\CampaignBlueprint;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Attributes\Strict;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

#[Strict]
class PostGenerationAgent implements Agent, Conversational, HasStructuredOutput
{
    use Promptable;

    public function __construct(
        protected CampaignBlueprint $campaignBlueprint,
    ) {}

    public function instructions(): Stringable|string
    {
        return <<<INSTRUCTIONS
You are ThreadForge, a technical ghostwriter for X posts.
Transform raw developer notes into one concise post draft.
Respect the campaign blueprint exactly:
- Tone: {$this->campaignBlueprint->tone}
- Maximum hashtags: {$this->campaignBlueprint->max_hashtags}
- Maximum characters for hook: {$this->campaignBlueprint->max_characters}
- Extra rules: {$this->campaignBlueprint->additional_rules}

Return only the structured output requested by the schema. Do not add keys.
INSTRUCTIONS;
    }

    /**
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    public function provider(): string
    {
        return config('threadforge.ai.provider', 'xai');
    }

    public function model(): string
    {
        return config('threadforge.ai.model', 'grok-4-1-fast-reasoning');
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'hook_propose' => $schema->string()
                ->max(280)
                ->description('A strong X post hook, never longer than 280 characters.')
                ->required(),
            'body_points' => $schema->array()
                ->items($schema->string())
                ->min(1)
                ->description('Concrete technical points extracted from the raw content.')
                ->required(),
            'technicalreadabilityscore' => $schema->integer()
                ->min(0)
                ->max(100)
                ->description('Technical readability score from 0 to 100.')
                ->required(),
            'suggested_hashtags' => $schema->array()
                ->items($schema->string())
                ->description('Suggested hashtags respecting the blueprint maximum.')
                ->required(),
            'tonecompliancejustification' => $schema->string()
                ->description('Short explanation of how the draft respects the blueprint tone.')
                ->required(),
        ];
    }
}
