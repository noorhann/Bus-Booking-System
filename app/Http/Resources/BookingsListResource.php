<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingsListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'seat_count' => $this->seat_count,
            'seat_id' => $this->seat_id,
            'user_id' => $this->user_id,
            'start_city' => $this->start_city,
            'end_city' => $this->end_city,
        ];
    }
}
