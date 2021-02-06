<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
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
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'collected' => $this->collected,
            'image' => $this->image,
            'description' => $this->description,
            'delivery_id' => $this->delivery_id,
            'maintenance_id' => $this->maintenance_id,
            'collected_id' => $this->collected_id,
            'donor_id' => $this->donor_id,
        ];
    }
}
