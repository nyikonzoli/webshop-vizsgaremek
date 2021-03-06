<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Report;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = $this->images;
        $isReported = false;
        $report = Report::where('type', '=', 'product')->where('objectId', '=', $this->id)->first();
        if(!is_null($report)) $isReported = true;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'size' => $this->size,
            'iced' => $this->iced,
            'sold' => $this->sold,
            'userId' => $this->userId,
            'categoryId' => $this->categoryId,
            'images' => $images,
            'isReported' => $isReported,
        ];
    }
}
