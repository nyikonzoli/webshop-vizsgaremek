<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class IncomingReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = User::find($this->userId);
        $objectName = "";
        if($this->type == "product") $objectName = $this->getProduct()->name;
        else if($this->type == "conversation") $objectName = $this->getConversation()->name;
        else if($this->type == "review") $objectName = $this->getReview()->name;

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
