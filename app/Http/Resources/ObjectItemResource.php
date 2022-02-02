<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObjectItemResource extends JsonResource
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
            'title' => $this->title,
            'email' => $this->email,
            'responsible' => $this->responsible,
            'serviceItems' => ServiceItemCollection::make($this->whenLoaded('serviceItems')),
            'responsibles' => ResponsibleCollection::make($this->whenLoaded('responsibles')),
        ];
    }
}
