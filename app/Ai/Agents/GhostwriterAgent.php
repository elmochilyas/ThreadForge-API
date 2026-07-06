<?php

namespace App\Ai\Agents;

use App\Ai\Tools\GetCampaignRules;
use App\Ai\Tools\GetPostHistory;
use App\Models\GeneratedPost;
use Laravel\Ai\Concerns\RemembersConversations;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Promptable;
use Stringable;

class GhostwriterAgent implements Agent, Conversational, HasTools
{
    use Promptable;
    use RemembersConversations;

    public function __construct(
        protected GeneratedPost $generatedPost,
    ) {}

    public function instructions(): Stringable|string
    {
        $postId = $this->generatedPost->id;
        $campaignId = $this->generatedPost->rawContent->campaign_blueprint_id;

        return <<<INSTRUCTIONS
You are ThreadForge's contextual ghostwriter assistant.
The current generated post id is {$postId}; its campaign blueprint id is {$campaignId}.

Rules:
- For factual questions about campaign rules, call getCampaignRules with campaignId {$campaignId}.
- For factual questions about the post, its source, or previous versions, call getPostHistory with postId {$postId}.
- Use the conversation memory to resolve follow-up references such as "this one", "the previous version", or "make it shorter".
- Give direct, practical answers. Never invent blueprint rules or post history.
INSTRUCTIONS;
    }

    /**
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [
            new GetCampaignRules($this->generatedPost->rawContent->user_id),
            new GetPostHistory($this->generatedPost->rawContent->user_id),
        ];
    }

    public function provider(): string
    {
        return config('threadforge.ai.provider', 'xai');
    }

    public function model(): string
    {
        return config('threadforge.ai.model', 'grok-4-1-fast-reasoning');
    }
}
