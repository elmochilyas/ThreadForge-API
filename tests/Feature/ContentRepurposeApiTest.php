<?php

namespace Tests\Feature;

use App\Jobs\ProcessRawContentJob;
use App\Models\CampaignBlueprint;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ContentRepurposeApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_repurpose_endpoint_accepts_content_and_queues_processing(): void
    {
        Queue::fake();

        $user = User::factory()->create();
        $blueprint = CampaignBlueprint::query()->create([
            'user_id' => $user->id,
            'name' => 'Dev notes',
            'tone' => 'Clear and confident',
            'max_hashtags' => 1,
            'max_characters' => 280,
        ]);

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/content/repurpose', [
            'campaign_blueprint_id' => $blueprint->id,
            'content' => 'Today I fixed a queue timeout by making the worker idempotent before increasing retry limits.',
        ]);

        $response->assertAccepted()
            ->assertJsonPath('data.status', 'pending')
            ->assertJsonPath('data.campaign_blueprint.id', $blueprint->id);

        Queue::assertPushed(ProcessRawContentJob::class);

        $this->assertDatabaseHas('raw_contents', [
            'user_id' => $user->id,
            'campaign_blueprint_id' => $blueprint->id,
            'status' => 'pending',
        ]);
    }

    public function test_user_cannot_repurpose_with_another_users_blueprint(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();

        $blueprint = CampaignBlueprint::query()->create([
            'user_id' => $owner->id,
            'name' => 'Private',
            'tone' => 'Private',
        ]);

        Sanctum::actingAs($other);

        $this->postJson('/api/content/repurpose', [
            'campaign_blueprint_id' => $blueprint->id,
            'content' => 'This is a sufficiently long raw note to pass the content length validation.',
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['campaign_blueprint_id']);
    }
}
