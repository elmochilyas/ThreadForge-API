<?php

namespace App\Ai\Tools;

use App\Models\CampaignBlueprint;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class GetCampaignRules implements Tool
{
    public function __construct(
        protected int $userId,
    ) {}

    public function name(): string
    {
        return 'getCampaignRules';
    }

    public function description(): Stringable|string
    {
        return 'Read the real style rules for a campaign blueprint owned by the current user.';
    }

    public function handle(Request $request): Stringable|string
    {
        $campaign = CampaignBlueprint::query()
            ->where('user_id', $this->userId)
            ->find($request->integer('campaignId'));

        if (! $campaign) {
            return json_encode(['error' => 'Campaign blueprint not found.'], JSON_THROW_ON_ERROR);
        }

        return json_encode([
            'id' => $campaign->id,
            'name' => $campaign->name,
            'tone' => $campaign->tone,
            'max_hashtags' => $campaign->max_hashtags,
            'max_characters' => $campaign->max_characters,
            'additional_rules' => $campaign->additional_rules,
        ], JSON_THROW_ON_ERROR);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'campaignId' => $schema->integer()
                ->description('The campaign blueprint id to inspect.')
                ->required(),
        ];
    }
}
