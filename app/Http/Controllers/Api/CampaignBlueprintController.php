<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampaignBlueprintRequest;
use App\Http\Requests\UpdateCampaignBlueprintRequest;
use App\Http\Resources\CampaignBlueprintResource;
use App\Models\CampaignBlueprint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CampaignBlueprintController extends Controller
{
    /**
     * List campaign blueprints.
     *
     * Returns the authenticated creator's style blueprints with raw-content and generated-post counts.
     *
     * @group Campaign Blueprints
     *
     * @authenticated
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $blueprints = $request->user()
            ->campaignBlueprints()
            ->withCount(['rawContents', 'generatedPosts'])
            ->latest()
            ->get();

        return CampaignBlueprintResource::collection($blueprints);
    }

    /**
     * Create a campaign blueprint.
     *
     * Stores strict writing rules used later by the AI generation job.
     *
     * @group Campaign Blueprints
     *
     * @authenticated
     *
     * @bodyParam name string required Blueprint name. Example: Tech community daily posts
     * @bodyParam tone string required Writing tone. Example: Professional but relaxed
     * @bodyParam max_hashtags integer required Maximum number of hashtags. Example: 1
     * @bodyParam max_characters integer required Maximum hook length. Example: 280
     * @bodyParam additional_rules string Extra writing constraints. Example: Avoid buzzwords and end with a concrete lesson.
     */
    public function store(StoreCampaignBlueprintRequest $request): JsonResponse
    {
        $blueprint = $request->user()
            ->campaignBlueprints()
            ->create($request->validated());

        return response()->json([
            'message' => 'Campaign blueprint created successfully.',
            'data' => new CampaignBlueprintResource($blueprint),
        ], 201);
    }

    /**
     * Show a campaign blueprint.
     *
     * @group Campaign Blueprints
     *
     * @authenticated
     */
    public function show(Request $request, CampaignBlueprint $campaignBlueprint): JsonResponse
    {
        $this->authorizeBlueprint($request, $campaignBlueprint);

        $campaignBlueprint->loadCount(['rawContents', 'generatedPosts']);

        return response()->json([
            'data' => new CampaignBlueprintResource($campaignBlueprint),
        ]);
    }

    /**
     * Update a campaign blueprint.
     *
     * @group Campaign Blueprints
     *
     * @authenticated
     */
    public function update(UpdateCampaignBlueprintRequest $request, CampaignBlueprint $campaignBlueprint): JsonResponse
    {
        $this->authorizeBlueprint($request, $campaignBlueprint);

        $campaignBlueprint->update($request->validated());
        $campaignBlueprint->loadCount(['rawContents', 'generatedPosts']);

        return response()->json([
            'message' => 'Campaign blueprint updated successfully.',
            'data' => new CampaignBlueprintResource($campaignBlueprint),
        ]);
    }

    /**
     * Delete a campaign blueprint.
     *
     * @group Campaign Blueprints
     *
     * @authenticated
     */
    public function destroy(Request $request, CampaignBlueprint $campaignBlueprint): JsonResponse
    {
        $this->authorizeBlueprint($request, $campaignBlueprint);

        $campaignBlueprint->delete();

        return response()->json([
            'message' => 'Campaign blueprint deleted successfully.',
        ]);
    }

    protected function authorizeBlueprint(Request $request, CampaignBlueprint $campaignBlueprint): void
    {
        abort_unless($campaignBlueprint->user_id === $request->user()->id, 404);
    }
}
