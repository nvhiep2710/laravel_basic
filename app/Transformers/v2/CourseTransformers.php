<?php
namespace App\Transformers\v2;

use App\Eloquent\Course;
use League\Fractal\TransformerAbstract;

class CourseTransformers extends TransformerAbstract
{
	public function transform(Course $course)
	{
		return [
			'status' => true,
			'data' => [
				'id' => $course->id,
				'course_code' => $course->course_code,
				'course_name' => $course->course_name,
			],
		];
	}
}