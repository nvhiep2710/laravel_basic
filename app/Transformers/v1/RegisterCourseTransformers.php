<?php
namespace App\Transformers\v1;

use App\Eloquent\RegisterCourse;
use League\Fractal\TransformerAbstract;

class RegisterCourseTransformers extends TransformerAbstract
{
	public function transform(RegisterCourse $model)
	{
		return [
			'id_student' => $model->id_student,
			'id_course' => $model->id_course,
			'id_classes' => $model->id_classes,
		];
	}
}