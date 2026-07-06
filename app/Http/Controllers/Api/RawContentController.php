<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RawContentResource;
use App\Models\RawContent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RawContentController extends Controller
{
    /**
     * List raw content submissions.
     *
     * @group Content Generation
     *
     * @authenticated
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $rawContents = $request->user()
            ->rawContents()
            ->with(['campaignBlueprint', 'generatedPost'])
            ->latest()
            ->get();

        return RawContentResource::collection($rawContents);
    }

    /**
     * Show a raw content submission.
     *
     * @group Content Generation
     *
     * @authenticated
     */
    public function show(Request $request, RawContent $rawContent): JsonResponse
    {
        abort_unless($rawContent->user_id === $request->user()->id, 404);

        return response()->json([
            'data' => new RawContentResource($rawContent->load(['campaignBlueprint', 'generatedPost'])),
        ]);
    }
}
