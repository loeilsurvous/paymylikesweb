<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JackportResource extends JsonResource
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
            'description' => $this->description,
            'maxparticipant' => $this->maxparticipant,
            'status' => $this->status,
            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,
            'is_public' => $this->is_public,
            'amount' => $this->amount,
            'solde' => $this->solde,
            'created_at' => $this->created_at,
            'owner' => new UserResource($this->whenLoaded('owner'))
        ];
    }
}
