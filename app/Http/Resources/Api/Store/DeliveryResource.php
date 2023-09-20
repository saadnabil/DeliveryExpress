<?php

namespace App\Http\Resources\Api\Store;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'otherPhone' => $this->other_phone,
            'birthDate' => $this->birth_date,
            'idNumber' => $this->id_number,
            'image' => $this->image ? url('storage/'. $this->image) : null,
            'address' => $this->address,
            'city' => $this->city->name,
            'country' => $this->country->name,
            'credit' => $this->credit,
            'isVerified' => $this->verified,
            'isActive' => $this->active,
        ];
    }
}
