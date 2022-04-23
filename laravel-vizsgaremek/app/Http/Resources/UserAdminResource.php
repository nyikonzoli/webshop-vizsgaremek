<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $isAdmin = false;
        if(!is_null($this->admin)) $isAdmin = true;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'profilePictureURI' => $this->getProfilePictureURI(),
            'description' => $this->description,
            'isAdmin' => $isAdmin
        ];
    }
}
