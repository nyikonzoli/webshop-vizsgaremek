<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $sender = User::find($this->userId);
        $objectName = "";
        $receiver = $this->getReceiver();
        if($this->type == "product") $objectName = $this->getProduct()->name;
        else if($this->type == "conversation") $objectName = $this->getConversation()->name;
        else if($this->type == "review") $objectName = $receiver->name . "'s review";

        return [
            "id" => $this->id,
            "senderId" => $sender->id,
            "senderName" => $sender->name,
            "receiverId" => $receiver->id,
            "receiverName" => $receiver->name,
            "type" => $this->type,
            "objectId" => $this->objectId,
            "objectName" => $objectName,
        ];
    }
}
