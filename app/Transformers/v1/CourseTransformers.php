<?php
namespace App\Transformers\v1;

use App\Eloquent\Course;
use League\Fractal\TransformerAbstract;

class CourseTransformers extends TransformerAbstract
{
	public function transform(Course $course)
	{
		return [
			'course_code' => $course->course_code,
			'course_name' => $course->course_name,
		];
	}
	
}