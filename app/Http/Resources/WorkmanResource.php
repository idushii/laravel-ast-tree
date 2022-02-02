<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkmanResource extends JsonResource
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
            'employed_id' => $this->employed_id,
            'fio' => $this->fio,
            'phone' => $this->phone,
            'comment' => $this->comment,
            'year_birth' => $this->year_birth,
            'passport' => $this->passport,
            'inn' => $this->inn,
            'bank_card' => $this->bank_card,
        ];
    }
}
