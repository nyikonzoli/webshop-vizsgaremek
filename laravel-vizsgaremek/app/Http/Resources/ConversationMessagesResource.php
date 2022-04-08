<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MessageResource;

class ConversationMessagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $messages = $this->messages;
        $resources = [];
        foreach ($messages as $message) {
            $resources[] = new MessageResource($message);
        }
        return [
            "messages" => $resources,
        ];
    }
}
