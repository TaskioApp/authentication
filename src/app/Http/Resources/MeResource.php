<?php

namespace Taskio\Authentication\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'socket_id' => $this->socket_id,
            'banned_at' => $this->banned_at,
            'activated_at' => $this->activated_at,
            'email_verified_at' => $this->email_verified_at,
            'last_logged_in_at' => $this->last_logged_in_at,
            'avatar' => $this->avatar,
        ];
    }
}
