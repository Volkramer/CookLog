<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Role as RoleResource;

class User extends JsonResource
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
            'id' => $this->id,
            'username' => $this->name,
            'email' => $this->email,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'description' => $this->user_description,
            'privateMode' => $this->toggle_private,
            'role' => $this->role->role,
            'skillLevel' => $this->skillLevel,
            'creationDate' => $this->created_at,
            'lastModified' => $this->updated_at,
        ];
    }
}
