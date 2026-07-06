<?php

namespace App\Http\Controllers\Api;

use App\Ai\Agents\GhostwriterAgent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChatWithPostRequest;
use App\Models\GeneratedPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class GhostwriterChatController extends Controller
{
    /**
     * Chat with a generated post.
     *
     * Starts or continues a remembered ghostwriter conversation for one generated post.
     *
     * @group Ghostwriter Assistant
     *
     * @authenticated
     *
     * @bodyParam message string required Natural-language instruction or question. Example: Give me 3 sharper hooks.
     * @bodyParam conversation_id string Optional conversation id returned by a previous chat response. Example: 0197a467-7ac1-7000-8bbf-ccdf6b1c9261
     */
    public function store(ChatWithPostRequest $request, GeneratedPost $generatedPost): JsonResponse
    {
        $generatedPost->loadMissing('rawContent.campaignBlueprint');

        abort_unless($generatedPost->rawContent?->user_id === $request->user()->id, 404);

        $agent = new GhostwriterAgent($generatedPost);

        if ($request->filled('conversation_id')) {
            $this->authorizeConversation($request->string('conversation_id')->toString(), $request->user()->id);
            $agent->continue($request->string('conversation_id')->toString(), $request->user());
        } else {
            $agent->forUser($request->user());
        }

        $response = $agent->prompt($request->string('message')->toString());

        return response()->json([
            'message' => $response->text,
            'conversation_id' => $response->conversationId,
            'tool_calls' => $response->toolCalls->map->toArray()->values(),
            'tool_results' => $response->toolResults->map->toArray()->values(),
        ]);
    }

    protected function authorizeConversation(string $conversationId, int $userId): void
    {
        $exists = DB::table(config('ai.conversations.tables.conversations', 'agent_conversations'))
            ->where('id', $conversationId)
            ->where('user_id', $userId)
            ->exists();

        abort_unless($exists, 404);
    }
}
