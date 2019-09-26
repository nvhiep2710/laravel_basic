<?php

namespace App\Http\Resources\v2\RegisterCourse;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Eloquent\RegisterCourse;
use App\Http\Resources\v2\Student\StudentResource;
use App\Http\Resources\v2\Course\CourseResource;
use App\Http\Resources\v2\Classes\ClassResource;

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
           'description' => ['status' => true,'message'=>'get data success'],
       ];
   }

}
