<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'title' => $this->title,
            'date_time' => $this->date_time->toIso8601String(),
            'date_formatted' => $this->date_time->format('M d, Y'),
            'time_formatted' => $this->date_time->format('H:i'),
            'location' => [
                'name' => $this->location_name,
                'latitude' => (float) $this->location_latitude,
                'longitude' => (float) $this->location_longitude,
            ],
            'broadcast' => [
                'channel' => $this->broadcasted_on,
                'link' => $this->broadcast_link,
            ],
            'description' => $this->description,
            'status' => $this->status,
            'score' => $this->score_json,
            'teams' => TeamResource::collection($this->whenLoaded('teams')),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}