<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'tampak_depan' => $this->tampak_depan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
