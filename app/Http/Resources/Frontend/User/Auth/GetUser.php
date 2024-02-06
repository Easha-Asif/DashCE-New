<?php

namespace App\Http\Resources\Frontend\User\Auth;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class GetUser extends JsonResource
{
    public function toArray($request)
    {   
        return [
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'email' => $this->email ?? '',
            'image' => $this->image ?? '',
            'verified_by' => $this->verified_by ?? '',
            'otp' => $this->otp ?? '',
            // 'otp' => $this->otp ?? '',

            $this->merge(
                Arr::except(
                    parent::toArray($request),
                    [
                        'created_at',
                        'updated_at',
                        // 'roles',
                        'deleted_at',
                        // 'status',
                        'pivot'
                    ]
                )
            ),
        ];
    }
}