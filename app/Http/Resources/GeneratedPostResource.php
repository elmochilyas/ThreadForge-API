<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneratedPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'hook_propose' => $this->hook_propose,
            'body_points' => $this->body_points,
            'technical_readability_score' => $this->technical_readability_score,
            'suggested_hashtags' => $this->suggested_hashtags,
            'tone_compliance_justification' => $this->tone_compliance_justification,

            'status' => $this->status->value ?? $this->status,

            'raw_content' => new RawContentResource(
                $this->whenLoaded('rawContent')
            ),

            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
