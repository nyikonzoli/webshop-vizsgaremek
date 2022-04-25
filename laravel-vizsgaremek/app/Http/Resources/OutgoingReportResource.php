<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class OutgoingReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = null;
        $objectName = "";
        if($this->type == "product"){
            $objectName = $this->getProduct()->name;
            $user = $this->getProduct()->user;
        } 
        else if($this->type == "conversation"){
            $objectName = $this->getConversation()->name;
            if($this->getConversation()->sellerId == $this->userId) $user = $this->getConversatoin()->buyer;
            else $user = $this->getConversation()->seller;
        } 
        else if($this->type == "review"){
            if($this->getReview()->sellerId == $this->userId) $user = $this->getReview()->buyerConnection;
            else $user = $this->getReview()->sellerConnection;
            $objectName = $user->name . "'s review";
        } 

        return [
            "id" => $this->id,
            "userId" => $user->id,
            "userName" => $user->name,
            "type" => $this->type,
            "objectId" => $this->objectId,
            "objectName" => $objectName,
        ];
    }
}
