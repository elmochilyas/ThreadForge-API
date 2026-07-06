<?php

namespace App\Jobs;

use App\Models\GeneratedPost;
use App\Models\RawContent;
use App\RawContentStatus;
use App\Services\ThreadPostGenerationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Throwable;

class ProcessRawContentJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public int $timeout = 120;

    public function __construct(
        public RawContent $rawContent,
    ) {}

    public function handle(ThreadPostGenerationService $generator): void
    {
        $rawContent = $this->rawContent->refresh();

        if ($rawContent->status === RawContentStatus::Completed) {
            return;
        }

        $rawContent->update(['status' => RawContentStatus::Processing]);

        try {
            $generatedPost = $generator->generate($rawContent);

            GeneratedPost::query()->updateOrCreate(
                ['raw_content_id' => $rawContent->id],
                $generatedPost,
            );

            $rawContent->update(['status' => RawContentStatus::Completed]);
        } catch (Throwable $throwable) {
            $rawContent->update(['status' => RawContentStatus::Failed]);

            throw $throwable;
        }
    }
}
