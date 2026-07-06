<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepurposeContentRequest;
use App\Http\Resources\RawContentResource;
use App\Jobs\ProcessRawContentJob;
use App\RawContentStatus;
use Illuminate\Http\JsonResponse;

class ContentRepurposeController extends Controller
{
    /**
     * Submit raw content for repurposing.
     *
     * Creates a raw-content record and queues the Grok generation job. The HTTP request returns immediately.
     *
     * @group Content Generation
     *
     * @authenticated
     *
     * @bodyParam campaign_blueprint_id integer required Existing campaign blueprint id owned by the authenticated user. Example: 1
     * @bodyParam content string required Raw notes, markdown, or experience report to repurpose. Example: Today I refactored a queue worker and learned that idempotency matters more than retries.
     */
    public function store(RepurposeContentRequest $request): JsonResponse
    {
        $rawContent = $request->user()->rawContents()->create([
            'campaign_blueprint_id' => $request->integer('campaign_blueprint_id'),
            'content' => $request->string('content')->toString(),
            'status' => RawContentStatus::Pending,
        ]);

        ProcessRawContentJob::dispatch($rawContent);

        return response()->json([
            'message' => 'Raw content accepted and queued for AI processing.',
            'data' => new RawContentResource($rawContent->load('campaignBlueprint')),
        ], 202);
    }
}
