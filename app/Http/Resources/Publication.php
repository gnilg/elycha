<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Publication extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "label" => $this->label,
            "place" => $this->place,
            "description" => $this->description,
            "photo" => $this->photo,
            "price" => $this->price,
            "place_lat" => $this->place_lat,
            "place_long" => $this->place_long,
            "is_immo" => $this->is_immo,
            "user" => $this->user,
            "status" => $this->status,
            "created_at" => superFormatDate($this->created_at),
            "category" => $this->category,
            "likes" => $this->likes,
            "views" => $this->views,
            "photos" => $this->photos
        ];
    }
}
