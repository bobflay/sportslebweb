<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->first_name . ' ' . $this->last_name,
            'position' => $this->position,
            'number' => $this->number,
            'photo_url' => $this->photo_url,
            'date_of_birth' => $this->date_of_birth?->format('Y-m-d'),
            'age' => $this->date_of_birth ? now()->diffInYears($this->date_of_birth) : null,
        ];
    }
}