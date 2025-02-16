<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'avatar' => $this->avatar,
            'type_user' => $this->type_user,
            'status' => $this->status,
            'token' => $this->token,
            'balance' => $this->balance,
        ];
    }
}
