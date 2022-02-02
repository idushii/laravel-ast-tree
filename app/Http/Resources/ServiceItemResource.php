<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceItemResource extends JsonResource
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
            'template' => $this->template,
            'size' => $this->size,
            'active' => $this->active,
            'object_item_id' => $this->object_item_id,
            'responsibles' => ResponsibleCollection::make($this->whenLoaded('responsibles')),
        ];
    }
}
