<?php

namespace App\Http\Resources\Api\Delivery;

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
            'birth_date' => $this->birth_date,
            'id_number' => $this->id_number,
            'address' => $this->address,
            'website' => $this->website,
            'credit' => $this->credit,
            'isVerified' => $this->verified,
            'isActive' => $this->active,
            'city' => $this->city->name,
            'country' => $this->country->name,
            'image' => $this->image ? url('storage/'. $this->image) : null,
        ];
    }
}
