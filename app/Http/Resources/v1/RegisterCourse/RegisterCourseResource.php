<?php

namespace App\Http\Resources\v1\RegisterCourse;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Eloquent\RegisterCourse;
use App\Http\Resources\v1\Student\StudentResource;
use App\Http\Resources\v1\Course\CourseResource;
use App\Http\Resources\v1\Classes\ClassResource;

class RegisterCourseResource extends JsonResource
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
         //'student' => $this->id_student,
           // 'status' => true,
           'student' => new StudentResource($this->student),
           'course' => new CourseResource($this->course),
           'class' => new ClassResource($this->classes),
       ];
   }

}
