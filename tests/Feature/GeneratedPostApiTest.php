<?php

namespace Tests\Feature;

use App\Models\CampaignBlueprint;
use App\Models\GeneratedPost;
use App\Models\RawContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GeneratedPostApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_list_and_update_their_generated_post_status(): void
    {
        $user = User::factory()->create();
        $post = $this->createGeneratedPost($user);

        $otherPost = $this->createGeneratedPost(User::factory()->create(), 'Hidden hook');

        Sanctum::actingAs($user);

        $this->getJson('/api/generated-posts')
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $post->id)
            ->assertJsonMissing(['id' => $otherPost->id]);

        $this->patchJson("/api/generated-posts/{$post->id}/status", [
            'status' => 'posted',
        ])->assertOk()
            ->assertJsonPath('data.status', 'posted');

        $this->assertDatabaseHas('generated_posts', [
            'id' => $post->id,
            'status' => 'posted',
        ]);
    }

    public function test_user_cannot_view_another_users_generated_post(): void
    {
        $post = $this->createGeneratedPost(User::factory()->create());

        Sanctum::actingAs(User::factory()->create());

        $this->getJson("/api/generated-posts/{$post->id}")->assertNotFound();
    }

    protected function createGeneratedPost(User $user, string $hook = 'Ship smaller, learn faster.'): GeneratedPost
    {
        $blueprint = CampaignBlueprint::query()->create([
            'user_id' => $user->id,
            'name' => 'Tech',
            'tone' => 'Practical',
        ]);

        $rawContent = RawContent::query()->create([
            'user_id' => $user->id,
            'campaign_blueprint_id' => $blueprint->id,
            'content' => 'A sufficiently long raw note about technical learning and shipping.',
            'status' => 'completed',
        ]);

        return GeneratedPost::query()->create([
            'raw_content_id' => $rawContent->id,
            'hook_propose' => $hook,
            'body_points' => ['Point one'],
            'technical_readability_score' => 80,
            'suggested_hashtags' => ['#Dev'],
            'tone_compliance_justification' => 'Matches tone.',
        ]);
    }
}
