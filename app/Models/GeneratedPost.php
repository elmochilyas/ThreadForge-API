<?php

namespace App\Models;

use App\GeneratedPostStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneratedPost extends Model
{
    public const STATUS_DRAFT = 'draft';

    public const STATUS_ARCHIVED = 'archived';

    public const STATUS_POSTED = 'posted';

    protected $fillable = [
        'raw_content_id',
        'hook_propose',
        'body_points',
        'technical_readability_score',
        'suggested_hashtags',
        'tone_compliance_justification',
        'payload_brut',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'body_points' => 'array',
            'suggested_hashtags' => 'array',
            'payload_brut' => 'array',
            'technical_readability_score' => 'integer',
            'status' => GeneratedPostStatus::class,
        ];
    }

    public function rawContent(): BelongsTo
    {
        return $this->belongsTo(RawContent::class);
    }
}
