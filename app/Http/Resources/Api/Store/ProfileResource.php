<?php

namespace App\Http\Resources\Api\Store;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'otherPhone' => $this->other_phone,
                'storeName' => $this->store_name,
                'address' => $this->address,
                'website' => $this->website,
                'credit' => $this->credit,
                'isVerified' => $this->verified,
                'isActive' => $this->active,
                'activity' => $this->activity->title,
                'city' => $this->city->name,
                'country' => $this->country->name,
                'image' => $this->image ? url('storage/'. $this->image) : null,
        ];
    }
}
