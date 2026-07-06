<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGeneratedPostStatusRequest;
use App\Http\Resources\GeneratedPostResource;
use App\Models\GeneratedPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GeneratedPostController extends Controller
{
    /**
     * List generated posts.
     *
     * Returns the authenticated creator's generated posts with their raw content and blueprint context.
     *
     * @group Generated Posts
     *
     * @authenticated
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $posts = GeneratedPost::query()
            ->with(['rawContent.campaignBlueprint'])
            ->whereHas('rawContent', fn ($query) => $query->where('user_id', $request->user()->id))
            ->latest()
            ->get();

        return GeneratedPostResource::collection($posts);
    }

    /**
     * Show a generated post.
     *
     * @group Generated Posts
     *
     * @authenticated
     */
    public function show(Request $request, GeneratedPost $generatedPost): JsonResponse
    {
        $this->authorizePost($request, $generatedPost);

        return response()->json([
            'data' => new GeneratedPostResource($generatedPost->load('rawContent.campaignBlueprint')),
        ]);
    }

    /**
     * Update generated post status.
     *
     * Moves a generated post between draft, archived, and posted.
     *
     * @group Generated Posts
     *
     * @authenticated
     *
     * @bodyParam status string required One of draft, archived, posted. Example: posted
     */
    public function updateStatus(UpdateGeneratedPostStatusRequest $request, GeneratedPost $generatedPost): JsonResponse
    {
        $this->authorizePost($request, $generatedPost);

        $generatedPost->update($request->validated());

        return response()->json([
            'message' => 'Generated post status updated successfully.',
            'data' => new GeneratedPostResource($generatedPost->load('rawContent.campaignBlueprint')),
        ]);
    }

    protected function authorizePost(Request $request, GeneratedPost $generatedPost): void
    {
        $generatedPost->loadMissing('rawContent');

        abort_unless($generatedPost->rawContent?->user_id === $request->user()->id, 404);
    }
}
