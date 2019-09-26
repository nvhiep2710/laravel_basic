<?php
namespace App\Transformers\v1;

use App\Eloquent\Classes;
use League\Fractal\TransformerAbstract;
use App\Transformers\v1\CourseTransformers;
use Carbon\Carbon;

class ClassTransformers extends TransformerAbstract
{

	protected $availableIncludes  = ['course'];
	public function transform(Classes $model)
	{
		return [
			'class_code' => $model->class_code,
			'class_name' => $model->class_name,
			'start_date' => $model->start_date,
			'end_date' => $model->end_date,
			'schedule' => $model->schedule,
			'id_course' => $model->id_course,		
		];
	}
	public function includeCourse(Classes $class)
	{
		return $this->item($class->course, new CourseTransformers);
	}
}