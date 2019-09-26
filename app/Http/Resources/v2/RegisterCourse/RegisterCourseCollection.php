<?php

namespace App\Http\Resources\v2\RegisterCourse;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\v2\RegisterCourse\RegisterCourseResource;
class RegisterCourseCollection extends ResourceCollection
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
            RegisterCourseResource::collection($this->collection),
        ];
    }
}
