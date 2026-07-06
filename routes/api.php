<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CampaignBlueprintController;
use App\Http\Controllers\Api\ContentRepurposeController;
use App\Http\Controllers\Api\GeneratedPostController;
use App\Http\Controllers\Api\GhostwriterChatController;
use App\Http\Controllers\Api\RawContentController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::apiResource('campaign-blueprints', CampaignBlueprintController::class);

    Route::post('/content/repurpose', [ContentRepurposeController::class, 'store']);
    Route::get('/raw-contents', [RawContentController::class, 'index']);
    Route::get('/raw-contents/{rawContent}', [RawContentController::class, 'show']);

    Route::get('/generated-posts', [GeneratedPostController::class, 'index']);
    Route::get('/generated-posts/{generatedPost}', [GeneratedPostController::class, 'show']);
    Route::patch('/generated-posts/{generatedPost}/status', [GeneratedPostController::class, 'updateStatus']);
    Route::post('/generated-posts/{generatedPost}/chat', [GhostwriterChatController::class, 'store']);
});
