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
            "id" => $this->id,
            "partnerName" => $this->seller->name,
            "partnerProfilepictureURI" => $this->seller->getProfilePictureURI(),
            "productPictureURI" => $this->product->images->first()->imageURI,
            "productName" => $this->product->name,
        ];
    }
}
