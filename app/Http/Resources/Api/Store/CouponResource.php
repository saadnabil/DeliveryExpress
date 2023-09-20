<?php

namespace App\Http\Resources\Api\Store;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'expire_date' => Carbon::parse($this->expire_date)->format('Y/m/d H:i a'),
            'discount' => $this->discount . '%',

        ];
    }
}
