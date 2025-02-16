<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Message extends JsonResource
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
            "content" => $this->content,
            "user_id" => $this->user_id,
            "time" => getTimeOrDate($this->created_at),
            "sender_type" => strval($this->sender_type),
            "user" => $this->user
        ];
    }
}
