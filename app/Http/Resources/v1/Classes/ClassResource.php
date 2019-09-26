<?php

namespace App\Http\Resources\v1\Classes;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Eloquent\Classes;
class ClassResource extends JsonResource
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
            'class_code' => $this->class_code,
            'class_name' => $this->class_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'schedule' => $this->schedule,
            'id_course' => $this->id_course,
        ];
    }
}
