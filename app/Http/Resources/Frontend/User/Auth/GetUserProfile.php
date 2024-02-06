<?php

namespace App\Http\Resources\Frontend\User\Auth;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class GetUserProfile extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'email' => $this->email ?? '',
            'image' => $this->image ?? '',
        ];
    }
}