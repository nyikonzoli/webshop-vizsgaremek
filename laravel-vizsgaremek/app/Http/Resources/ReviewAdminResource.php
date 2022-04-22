<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class ReviewAdminResource extends JsonResource
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
            "sellerId" => $this->sellerId,
            "sellerName" => User::find($this->sellerId)->name,
            "buyerId" => $this->buyerId,
            "buyerName" => User::find($this->buyerId)->name,
            "content" => $this->content,
            "rating" => $this->rating,
        ];
    }
}
