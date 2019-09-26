<?php

namespace App\Http\Resources\v1\Student;

use Illuminate\Http\Resources\Json\ResourceCollection;
class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
     return [
        StudentResource::collection($this->collection),
    ];
}
}
