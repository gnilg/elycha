<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Inquiry extends JsonResource
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
            "place" => $this->place,
            "description" => $this->description,
            "price" => $this->price,
            "is_immo" => $this->is_immo,
            "user" => $this->user,
            "status" => $this->status,
            "created_at" => superFormatDate($this->created_at),
            "category" => $this->category
        ];
    }
}
