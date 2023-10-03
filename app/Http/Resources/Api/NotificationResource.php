<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'title' => __('translation.Delivery Express'),
            'message' => $this->message,
            'isRead' => $this->is_read,
            'time' => Carbon::parse($this->created_at)->format('Y/m/d h:i a'),
        ];
    }
}
