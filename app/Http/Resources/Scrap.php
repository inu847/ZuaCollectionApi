<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Scrap extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // data collection
        return parent::toArray($request);

        // data tunggal/$id
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        //     ];
    }
}
