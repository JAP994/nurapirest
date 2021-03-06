<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceResource extends JsonResource
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
            'mantenancedate' => $this->mantenancedate,
            'observation' => $this->lastname,
            'description' => $this->description,
            'image' => $this->image,
            'user_id' => $this->user_id
        ];
    }
}
