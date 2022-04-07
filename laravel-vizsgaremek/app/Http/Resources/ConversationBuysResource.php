<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class ConversationBuysResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "partnerName" => User::find($this->sellerId)->name,
            "partnerProfilepictureURI" => User::find($this->sellerId)->getProfilePictureURI(),
        ];
    }
}
