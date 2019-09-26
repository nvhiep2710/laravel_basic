<?php

namespace App\Http\Resources\v2\Course;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Eloquent\Course;
class CourseResource extends JsonResource
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
           'course_code' => $this->course_code,
           'course_name' => $this->course_name,
       ];
   }
}
