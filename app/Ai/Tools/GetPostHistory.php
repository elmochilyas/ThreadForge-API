<?php

namespace App\Ai\Tools;

use App\Models\GeneratedPost;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class GetPostHistory implements Tool
{
    public function __construct(
        protected int $userId,
    ) {}

    public function name(): string
    {
        return 'getPostHistory';
    }

    public function description(): Stringable|string
    {
        return 'Read the real generated post, raw source content, and stored version data owned by the current user.';
    }

    public function handle(Request $request): Stringable|string
    {
        $post = GeneratedPost::query()
            ->with(['rawContent.campaignBlueprint'])
            ->whereHas('rawContent', fn ($query) => $query->where('user_id', $this->userId))
            ->find($request->integer('postId'));

        if (! $post) {
            return json_encode(['error' => 'Generated post not found.'], JSON_THROW_ON_ERROR);
        }

        return json_encode([
            'post' => [
                'id' => $post->id,
                'hook_propose' => $post->hook_propose,
                'body_points' => $post->body_points,
                'technical_readability_score' => $post->technical_readability_score,
                'suggested_hashtags' => $post->suggested_hashtags,
                'tone_compliance_justification' => $post->tone_compliance_justification,
                'status' => $post->status->value ?? $post->status,
                'created_at' => $post->created_at?->format('Y-m-d H:i:s'),
                'updated_at' => $post->updated_at?->format('Y-m-d H:i:s'),
            ],
            'raw_content' => [
                'id' => $post->rawContent->id,
                'content' => $post->rawContent->content,
                'status' => $post->rawContent->status->value ?? $post->rawContent->status,
            ],
            'campaign_blueprint' => [
                'id' => $post->rawContent->campaignBlueprint->id,
                'name' => $post->rawContent->campaignBlueprint->name,
            ],
            'versions' => [
                [
                    'label' => 'current',
                    'hook_propose' => $post->hook_propose,
                    'body_points' => $post->body_points,
                    'captured_at' => $post->updated_at?->format('Y-m-d H:i:s'),
                ],
            ],
        ], JSON_THROW_ON_ERROR);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'postId' => $schema->integer()
                ->description('The generated post id to inspect.')
                ->required(),
        ];
    }
}
