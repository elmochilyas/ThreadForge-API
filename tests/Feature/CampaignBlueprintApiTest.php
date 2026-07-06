<?php

namespace Tests\Feature;

use App\Models\CampaignBlueprint;
use App\Models\RawContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CampaignBlueprintApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_and_list_only_their_blueprints_with_counts(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        Sanctum::actingAs($user);

        $created = $this->postJson('/api/campaign-blueprints', [
            'name' => 'Tech community',
            'tone' => 'Professional but relaxed',
            'max_hashtags' => 1,
            'max_characters' => 280,
            'additional_rules' => 'No more than one hashtag.',
        ]);

        $created->assertCreated()
            ->assertJsonPath('data.max_characters', 280)
            ->assertJsonMissingPath('data.user_id');

        RawContent::query()->create([
            'user_id' => $user->id,
            'campaign_blueprint_id' => $created->json('data.id'),
            'content' => 'A long enough raw technical note about queues and retries.',
        ]);

        CampaignBlueprint::query()->create([
            'user_id' => $otherUser->id,
            'name' => 'Private',
            'tone' => 'Hidden',
        ]);

        $this->getJson('/api/campaign-blueprints')
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.raw_contents_count', 1);
    }

    public function test_blueprint_validation_errors_are_json_422s(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->postJson('/api/campaign-blueprints', [
            'name' => '',
            'tone' => '',
            'max_hashtags' => 12,
            'max_characters' => 500,
        ])->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'tone', 'max_hashtags', 'max_characters']);
    }
}
