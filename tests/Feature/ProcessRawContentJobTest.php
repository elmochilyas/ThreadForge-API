<?php

namespace Tests\Feature;

use App\Ai\Agents\PostGenerationAgent;
use App\Jobs\ProcessRawContentJob;
use App\Models\CampaignBlueprint;
use App\Models\RawContent;
use App\Models\User;
use App\Services\ThreadPostGenerationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProcessRawContentJobTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_persists_valid_structured_ai_output(): void
    {
        PostGenerationAgent::fake([
            [
                'hook_propose' => 'Retries are not a strategy. Idempotency is.',
                'body_points' => ['Make workers safe to repeat', 'Then tune retry limits'],
                'technicalreadabilityscore' => 88,
                'suggested_hashtags' => ['#Laravel'],
                'tonecompliancejustification' => 'Direct, practical, and concise.',
            ],
        ]);

        $user = User::factory()->create();
        $blueprint = CampaignBlueprint::query()->create([
            'user_id' => $user->id,
            'name' => 'Tech',
            'tone' => 'Practical',
            'max_hashtags' => 1,
            'max_characters' => 280,
        ]);
        $rawContent = RawContent::query()->create([
            'user_id' => $user->id,
            'campaign_blueprint_id' => $blueprint->id,
            'content' => 'Today I learned that retries without idempotency can duplicate side effects.',
        ]);

        (new ProcessRawContentJob($rawContent))->handle(app(ThreadPostGenerationService::class));

        $rawContent->refresh();

        $this->assertSame('completed', $rawContent->status->value);
        $this->assertDatabaseHas('generated_posts', [
            'raw_content_id' => $rawContent->id,
            'hook_propose' => 'Retries are not a strategy. Idempotency is.',
            'technical_readability_score' => 88,
            'status' => 'draft',
        ]);

        $post = $rawContent->generatedPost()->firstOrFail();

        $this->assertSame(['Make workers safe to repeat', 'Then tune retry limits'], $post->body_points);
        $this->assertSame(['#Laravel'], $post->suggested_hashtags);
    }
}
