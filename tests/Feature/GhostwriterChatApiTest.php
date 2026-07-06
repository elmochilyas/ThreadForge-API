<?php

namespace Tests\Feature;

use App\Ai\Agents\GhostwriterAgent;
use App\Models\CampaignBlueprint;
use App\Models\GeneratedPost;
use App\Models\RawContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Ai\Responses\Data\ToolCall;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GhostwriterChatApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_uses_real_tools_and_returns_a_memory_conversation_id(): void
    {
        $user = User::factory()->create();
        $post = $this->createGeneratedPost($user);

        GhostwriterAgent::fake([
            new ToolCall('tool-call-1', 'getCampaignRules', ['campaignId' => $post->rawContent->campaign_blueprint_id]),
            'The blueprint allows one hashtag and asks for a practical tone.',
        ]);

        Sanctum::actingAs($user);

        $response = $this->postJson("/api/generated-posts/{$post->id}/chat", [
            'message' => 'What are the rules of my current Blueprint?',
        ]);

        $conversationId = $response->assertOk()
            ->assertJsonPath('tool_calls.0.name', 'getCampaignRules')
            ->assertJsonPath('message', 'The blueprint allows one hashtag and asks for a practical tone.')
            ->json('conversation_id');

        $this->assertNotNull($conversationId);
        $this->assertDatabaseHas('agent_conversations', [
            'id' => $conversationId,
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('agent_conversation_messages', [
            'conversation_id' => $conversationId,
            'role' => 'user',
        ]);
    }

    public function test_chat_can_continue_the_same_conversation_memory(): void
    {
        $user = User::factory()->create();
        $post = $this->createGeneratedPost($user);

        GhostwriterAgent::fake([
            'Here is a sharper English version.',
            'Here is another hook for that same version.',
        ]);

        Sanctum::actingAs($user);

        $first = $this->postJson("/api/generated-posts/{$post->id}/chat", [
            'message' => 'Translate the generated post in English.',
        ])->assertOk();

        $conversationId = $first->json('conversation_id');

        $second = $this->postJson("/api/generated-posts/{$post->id}/chat", [
            'message' => 'Give me another hook for this one.',
            'conversation_id' => $conversationId,
        ])->assertOk();

        $this->assertSame($conversationId, $second->json('conversation_id'));
        $this->assertDatabaseCount('agent_conversations', 1);
        $this->assertDatabaseCount('agent_conversation_messages', 4);
    }

    public function test_user_cannot_continue_someone_elses_conversation(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $post = $this->createGeneratedPost($other);

        GhostwriterAgent::fake(['Nope']);

        Sanctum::actingAs($owner);

        $first = $this->postJson("/api/generated-posts/{$post->id}/chat", [
            'message' => 'Start a conversation.',
        ]);

        $first->assertNotFound();
    }

    protected function createGeneratedPost(User $user): GeneratedPost
    {
        $blueprint = CampaignBlueprint::query()->create([
            'user_id' => $user->id,
            'name' => 'Tech community',
            'tone' => 'Practical',
            'max_hashtags' => 1,
            'max_characters' => 280,
            'additional_rules' => 'Avoid hype.',
        ]);

        $rawContent = RawContent::query()->create([
            'user_id' => $user->id,
            'campaign_blueprint_id' => $blueprint->id,
            'content' => 'A sufficiently long raw note about queues, idempotency, and retries.',
            'status' => 'completed',
        ]);

        return GeneratedPost::query()->create([
            'raw_content_id' => $rawContent->id,
            'hook_propose' => 'Retries are not a strategy. Idempotency is.',
            'body_points' => ['Make jobs repeatable before tuning retries.'],
            'technical_readability_score' => 90,
            'suggested_hashtags' => ['#Laravel'],
            'tone_compliance_justification' => 'Practical and concise.',
        ])->load('rawContent.campaignBlueprint');
    }
}
