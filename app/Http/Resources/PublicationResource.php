<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicationResource extends JsonResource
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
            'typePub' => $this->typePub,
            'contenu_pub' => $this->contenu_pub,
            'filename' => $this->filename,
            'date_pub' => $this->date_pub,
            'created_at' => $this->created_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'jackpot' => new JackportResource($this->whenLoaded('jackpot')),
        ];
    }
}
